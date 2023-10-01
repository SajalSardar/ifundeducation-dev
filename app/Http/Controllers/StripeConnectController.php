<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stripe\Account;
use Stripe\Stripe;

class StripeConnectController extends Controller {
    public function index() {
        return view('withdrawals.index');
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
