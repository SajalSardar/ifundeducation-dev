<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StripeConnectController extends Controller {
    public function index() {
        return view( 'withdrawals.index' );
    }

    public function stripeConnectAccount() {
        $stripe = new \Stripe\StripeClient( env( 'STRIPE_SECRET' ) );
        if ( auth()->user()->stripe_account_id === null ) {
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

            auth()->user()->update( [
                'stripe_account_id' => $stripeAccount->id,
            ] );

        }

        $accountOnbording = $stripe->accountLinks->create(
            [
                'account'     => auth()->user()->stripe_account_id,
                'refresh_url' => 'https://example.com/reauth',
                'return_url'  => 'https://example.com/return',
                'type'        => 'account_onboarding',
            ]
        );

        auth()->user()->update( [
            'stripe_connect_id' => $accountOnbording->expires_at,
        ] );

        return redirect( $accountOnbording->url );
    }
}
