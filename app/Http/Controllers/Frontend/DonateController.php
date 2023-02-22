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

        $platformFee = ( $request->amount * 3 ) / 100;

        $token = $request->stripeToken;

        \Stripe\Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

        $customer = \Stripe\Customer::create( [
            'source'   => $token,
            'name'     => $request->name,
            'email'    => $request->email,
            'metadata' => [
                'zip_code' => $request->zipCode,
                'country'  => $request->country,
            ],
        ] );

        $charge = \Stripe\Charge::create( [
            'amount'      => ( $request->amount + $platformFee ) * 100,
            'currency'    => 'usd',
            'description' => $post->title,
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