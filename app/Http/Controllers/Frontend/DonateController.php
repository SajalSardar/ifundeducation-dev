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
    public function donatePost( Request $request ) {

        $post = FundraiserPost::find( $request->post_id );

        \Stripe\Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $request->stripeToken;

        $customer = \Stripe\Customer::create( [
            'source' => $token,
            'name'   => 'sajal',
            'email'  => 'paying.user@example.com',
        ] );

        $charge = \Stripe\Charge::create( [
            'amount'      => 10 * 100,
            'currency'    => 'usd',
            'description' => 'Example charge',
            'customer'    => $customer->id,

        ] );

        // \Stripe\Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

        // $session = \Stripe\Checkout\Session::create( [
        //     'submit_type'          => 'donate',
        //     'payment_method_types' => ['card'],
        //     'line_items'           => [[
        //         'price_data' => [
        //             'currency'     => 'usd',
        //             'product_data' => [
        //                 'name' => $post->title,
        //             ],
        //             'unit_amount'  => 2000,
        //         ],
        //         'quantity'   => 1,
        //     ]],
        //     'mode'                 => 'payment',
        //     'success_url'          => route( 'front.donate.success' ),
        //     'cancel_url'           => route( 'front.donate.cancel' ),

        // ] );

        // return redirect()->away( $session->url );
    }

    public function donateSuccess() {
        return "success";
    }
    public function donateCancel() {
        return "cancel";
    }
}