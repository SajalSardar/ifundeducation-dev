<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class DonateController extends Controller {

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost( Request $request ) {
        Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

        $data = Charge::create( [
            "amount"      => $request->amount * 100,
            "currency"    => "usd",
            "source"      => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com.",
        ] );

        return back()->with( 'success', 'Payment successful!' );
    }
}