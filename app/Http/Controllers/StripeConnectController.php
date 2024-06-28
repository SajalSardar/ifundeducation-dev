<?php

namespace App\Http\Controllers;

use App\Models\FundraiserBalance;
use App\Models\Payout;
use App\Models\PayoutEmailVerification;
use App\Models\ThemeOption;
use App\Models\User;
use App\Notifications\PayoutEmailVerification as PayoutNotify;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PDF;
use Stripe\Account;
use Stripe\Balance;
use Stripe\Stripe;
use Yajra\DataTables\Facades\DataTables;

class StripeConnectController extends Controller {
    public function index() {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripeAccount = [];

        $account = $stripe->accounts->retrieve(
            auth()->user()->stripe_account_id,
            []
        );

        if ($account) {
            $stripeAccount['email']          = $account->email;
            $stripeAccount['display_name']   = $account->settings->dashboard->display_name;
            $stripeAccount['connected_date'] = date('d M Y', $account->created);
        }

        // $usersAmount = Auth::user()->load(['all_donars' => function ($q) {
        //     $q->select(DB::raw("SUM(net_balance) as balance"));
        // }]);
        $balance            = Auth::user()->load('balance');
        $payoutAttemptCount = PayoutEmailVerification::where('user_id', Auth::id())->whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('id', 'desc')->take(3)->count();

        $payoutRequest = Payout::where('user_id', Auth::id())->where('status', 'processing')->count();

        return view('withdrawals.index', compact('balance', 'stripeAccount', 'payoutAttemptCount', 'payoutRequest'));
    }

    public function listDataTable(Request $request) {
        $payoutRequestall = Payout::where('user_id', Auth::id());

        if ($request->all()) {
            $payoutRequestall->where(function ($query) use ($request) {
                if ($request->status) {
                    $query->where('status', '=', $request->status);
                }
                if ($request->fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->fromdate));
                    $query->where('created_at', '>=', $from_date);
                }
                if ($request->todate) {
                    $to_date = date("Y-m-d", strtotime($request->todate));
                    $query->where('created_at', '<=', $to_date);
                }
            });
        }

        return DataTables::of($payoutRequestall)

            ->editColumn('amount', function ($payoutRequestall) {
                return '$' . number_format($payoutRequestall->amount, 2);
            })
            ->editColumn('status', function ($payoutRequestall) {
                $status = $payoutRequestall->status == 'transfer' ? 'success' : 'warning';
                return '<span class="badge bg-' . $status . '">' . Str::ucfirst($payoutRequestall->status) . '</span>';
            })
            ->editColumn('created_at', function ($wishlists) {
                return $wishlists->created_at->format('M d, Y');
            })
            ->addIndexColumn()
            ->escapeColumns([])
            ->make(true);
    }

    public function stripeConnectAccount() {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        if (auth()->user()->stripe_account_id === null) {
            $stripeAccount = $stripe->accounts->create(
                [
                    'country'      => 'US',
                    'type'         => 'express',
                    'email'        => auth()->user()->email,
                    'capabilities' => [
                        'card_payments' => ['requested' => true],
                        'transfers'     => ['requested' => true],
                    ],
                ]
            );

            auth()->user()->update([
                'stripe_account_id' => $stripeAccount->id,
            ]);

        }

        // return $stripe->accounts->retrieve(
        //     auth()->user()->stripe_account_id,
        //     []
        // );
        $accountOnbording = $stripe->accountLinks->create(
            [
                'account'     => auth()->user()->stripe_account_id,
                'refresh_url' => 'http://ifundeducation.test/withdrawals',
                'return_url'  => 'http://ifundeducation.test/withdrawals',
                'type'        => 'account_onboarding',
            ]
        );

        // auth()->user()->update( [
        //     'stripe_connect_id' => $accountOnbording->expires_at,
        // ] );

        return redirect($accountOnbording->url);
    }

    public function stripeConnectLogin() {
        $auth = Auth::user();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $loginLink = Account::createLoginLink($auth->stripe_account_id);
        return redirect($loginLink->url);
    }

    public function verifyPayoutEmail(Request $request) {
        $user   = User::find($request->user_id);
        $code   = random_int(100000, 999999);
        $verify = PayoutEmailVerification::create([
            'user_id'      => $request->user_id,
            'code'         => $code,
            'expairy_date' => Carbon::now()->addMinutes(2),
        ]);

        try {
            $user->notify(new PayoutNotify($verify));
        } catch (\Exception) {
            return back()->with('error', 'Not sending an email  please try again');
        }
        return redirect()->route('withdrawals.verify.code.form');
    }

    public function verifyCodeForm() {
        $verifyCode = PayoutEmailVerification::where('user_id', Auth::id())->whereDate('created_at', '=', Carbon::today()->toDateString())->where('apply', NULL)->orderBy('id', 'desc')->first();
        if (!$verifyCode) {
            return redirect()->route('user.dashboard.index');
        }
        $nowTime     = time();
        $expaireTime = strtotime($verifyCode->expairy_date);
        if ($expaireTime < $nowTime) {
            return redirect()->route('withdrawals.index')->with('info', 'Time Expire!');
        }
        return view('withdrawals.verify');
    }

    public function verifyCodeSubmit(Request $request) {
        $request->validate([
            'code' => 'required',
        ]);
        $verifyCode = PayoutEmailVerification::where('code', $request->code)->first();
        if ($verifyCode) {
            $nowTime     = time();
            $expaireTime = strtotime($verifyCode->expairy_date);
            if ($expaireTime < $nowTime) {
                return back()->with('warning', 'Time Expire. Please, try again later');
            } elseif ($verifyCode->apply != null) {
                return back()->with('warning', 'Already Use This Code!');
            } else {
                $verifyCode->update([
                    'apply' => 'yes',
                ]);
                $request->session()->put('paymentVerifySuccess_' . auth()->user()->id, 'Verify success!');
                return redirect()->route('withdrawals.payout.view')->with('success', 'Verification Successfull!');
            }

        } else {
            return back()->with('warning', 'Invalid Code!');
        }
    }

    public function payoutView(Request $request) {
        $verifyCode = PayoutEmailVerification::where('user_id', Auth::id())->where('apply', 'yes')->whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('id', 'desc')->first();

        if ($verifyCode) {
            $endTime     = time();
            $expaireTime = strtotime($verifyCode->expairy_date) + 300;
            if ($expaireTime < $endTime) {
                $request->session()->forget('paymentVerifySuccess_' . auth()->user()->id);
                return redirect()->route('withdrawals.index')->with('info', 'Payout Time Expaire. Please, try again later');
            }
        }
        $verifySession = $request->session()->get('paymentVerifySuccess_' . auth()->user()->id);
        if (!$verifySession || !$verifyCode) {
            return redirect()->route('withdrawals.index')->with('info', 'Payout verification process incomplete!');
        }

        $balance = Auth::user()->load('balance');
        return view('withdrawals.payout', compact('balance'));
    }
    public function payoutRequest(Request $request) {

        $request->validate([
            'amount' => 'required',
        ]);

        $verifyCode = PayoutEmailVerification::where('user_id', Auth::id())->where('apply', 'yes')->whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('id', 'desc')->first();

        if ($verifyCode) {
            $endTime     = time();
            $expaireTime = strtotime($verifyCode->expairy_date) + 300;
            if ($expaireTime < $endTime) {
                $request->session()->forget('paymentVerifySuccess_' . auth()->user()->id);
                return redirect()->route('withdrawals.index')->with('info', 'Payout Time Expaire. Please, try again later');
            }
        }

        if (!$verifyCode) {
            return redirect()->route('withdrawals.index')->with('info', 'Payout verification process incomplete!');
        }

        $balance = Auth::user()->load('balance');

        if ((int) $balance->balance->curent_amount < $request->amount) {
            return back()->with('warning', 'Your balance is insufficient to process the payout request.');
        }
        $payout = Payout::create([
            'user_id' => Auth::id(),
            'amount'  => $request->amount,
            'status'  => 'processing',
        ]);

        $request->session()->forget('paymentVerifySuccess_' . auth()->user()->id);

        return redirect()->route('withdrawals.index')->with('success', 'Payout Request Successfully Send!');
    }

    public function payoutListAdmin() {
        $payoutRequestall = Payout::orderBy('id', 'desc')->paginate(25);
        return view('backend.payout.index', compact('payoutRequestall'));
    }

    public function payoutdetailsAdmin($id) {
        $payout = Payout::with('user.balance')->find($id);
        return view('backend.payout.details', compact('payout'));
    }

    public function stripeConnectTransfer(Request $request) {
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $transfer = \Stripe\Transfer::create([
                "amount"      => $request->amount * 100,
                "currency"    => "usd",
                "destination" => $request->stripe_account_id,
            ]);

            if ($transfer) {
                $userBalance = FundraiserBalance::find($request->balance);
                $userPayput  = Payout::find($request->payout_id);

                $userBalance->decrement('curent_amount', $request->amount);
                $userBalance->increment('withdraw_amount', $request->amount);

                $userPayput->update([
                    'status' => "transfer",
                ]);
            }

            return back()->with('success', 'Transfer Successfull');

        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    //download payout history
    public function downloadPayoutList(Request $request) {
        // return $request;

        $themeOption = ThemeOption::first();

        $payoutRequestall = Payout::where('user_id', Auth::id());

        if ($request->all()) {
            $payoutRequestall->where(function ($query) use ($request) {
                if ($request->pdf_status) {
                    $query->where('pdf_status', '=', $request->status);
                }
                if ($request->pdf_fromdate) {
                    $from_date = date("Y-m-d", strtotime($request->pdf_fromdate));
                    $query->where('created_at', '>=', $from_date);
                }
                if ($request->pdf_todate) {
                    $to_date = date("Y-m-d", strtotime($request->pdf_todate));
                    $query->where('created_at', '<=', $to_date);
                }
            });
        }

        $payoutRequestall = $payoutRequestall->get();
        // return $campaigns;
        if ($payoutRequestall->isEmpty()) {
            return back()->with('warning', 'Payout history not found!');
        }

        $table_columns = [];
        if ($request->payout_id_column) {
            array_push($table_columns, 'payout_id_column');
        }
        if ($request->amount_column) {
            array_push($table_columns, 'amount_column');
        }
        if ($request->date_column) {
            array_push($table_columns, 'date_column');
        }
        if ($request->status_column) {
            array_push($table_columns, 'status_column');
        }

        // return $table_columns;

        $data = [
            'payoutRequestall' => $payoutRequestall,
            'themeOption'      => $themeOption,
            'table_column'     => $table_columns,
        ];
        $pdf = PDF::loadView('pdf.frontend.payoutpdf', $data);
        $pdf->download('payout.pdf');
        return back();
    }

}
