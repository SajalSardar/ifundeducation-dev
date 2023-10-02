<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Stripe\Account;
use Stripe\Stripe;

class StripeConnectController extends Controller {
    public function index() {
        $usersAmount = Auth::user()->load(['all_donars' => function ($q) {
            $q->where('is_transfer_stripe', NULL)->select(DB::raw("SUM(net_balance) as balance"));
        }]);

        return view('withdrawals.index', compact('usersAmount'));
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

    public function stripeConnectTransfer() {
        $usersAmount = Auth::user()->load(['all_donars' => function ($q) {
            $q->whereNull('is_transfer_stripe')
                ->select(DB::raw("SUM(net_balance) as balance"));
        }]);

        $donatePost = User::where('id', auth()->user()->id)->with(['all_donars' => function ($q) {
            $q->whereNull('is_transfer_stripe');
        }])->first();

        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            if ($usersAmount->stripe_account_id && $usersAmount->stripe_account_id != null) {
                Donate::whereIn('id', $donatePost->all_donars->pluck('id'))->update([
                    'is_transfer_stripe' => 'yes',
                ]);
                $transfer = \Stripe\Transfer::create([
                    "amount"      => round($usersAmount->all_donars[0]->balance, 2) * 100,
                    "currency"    => "usd",
                    "destination" => $usersAmount->stripe_account_id,
                ]);
            }

            return back()->with('success', 'Transfer Successfull');

        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    // private $stripe;
    // public function __construct() {
    //     $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    //     Stripe::setApiKey(config('stripe.api_keys.secret_key'));
    // }

    // public function stripeAccount() {
    //     $queryData = [
    //         'response_type' => 'code',
    //         'client_id'     => config('stripe.client_id'),
    //         'scope'         => 'read_write',
    //         'redirect_uri'  => config('stripe.redirect_uri'),
    //     ];
    //     $connectUri = config('stripe.authorization_uri') . '?' . http_build_query($queryData);
    //     return redirect($connectUri);
    // }

    // public function redirect(Request $request) {
    //     $token = $this->getToken($request->code);
    //     if (!empty($token['error'])) {
    //         $request->session()->flash('danger', $token['error']);
    //         return response()->redirectTo('/');
    //     }
    //     $connectedAccountId = $token->stripe_user_id;
    //     $account            = $this->getAccount($connectedAccountId);
    //     if (!empty($account['error'])) {
    //         $request->session()->flash('danger', $account['error']);
    //         return response()->redirectTo('/');
    //     }
    //     auth()->user()->update([
    //         'stripe_connect_id' => $connectedAccountId,
    //     ]);
    //     return $token;
    //     return view('withdrawals.index', compact('account'));
    // }

    // private function getToken($code) {
    //     $token = null;
    //     try {
    //         $token = OAuth::token([
    //             'grant_type' => 'authorization_code',
    //             'code'       => $code,
    //         ]);
    //     } catch (Exception $e) {
    //         $token['error'] = $e->getMessage();
    //     }
    //     return $token;
    // }

    // private function getAccount($connectedAccountId) {
    //     $account = null;
    //     try {
    //         $account = $this->stripe->accounts->retrieve(
    //             $connectedAccountId,
    //             []
    //         );
    //     } catch (Exception $e) {
    //         $account['error'] = $e->getMessage();
    //     }
    //     return $account;
    // }
}
