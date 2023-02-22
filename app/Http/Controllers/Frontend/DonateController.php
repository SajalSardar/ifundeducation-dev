<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FundraiserPost;
use Illuminate\Http\Request;

class DonateController extends Controller {

    public function index( $slug ) {

        $fundPost  = FundraiserPost::where( 'slug', $slug )->select( 'id', 'user_id', 'slug', 'title', 'image', 'shot_description' )->firstOrFail();
        $countries = Country::all();
        return view( 'frontend.donate.stripe', compact( 'fundPost', 'countries' ) );

    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost( Request $request ) {

        // Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

        // $data = Charge::create( [
        //     "amount"      => $request->amount * 100,
        //     "currency"    => "usd",
        //     "source"      => $request->stripeToken,
        //     "description" => "Test payment from itsolutionstuff.com.",
        // ] );

        // return back()->with( 'success', 'Payment successful!' );
    }
}