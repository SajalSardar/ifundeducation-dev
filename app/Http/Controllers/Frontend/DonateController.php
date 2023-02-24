<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FundraiserPost;
use Exception;
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

        try {
            $stripe = new \Stripe\StripeClient( env( 'STRIPE_SECRET' ) );

            \Stripe\Stripe::setApiKey( env( 'STRIPE_SECRET' ) );

            $token = $stripe->tokens->create( [
                'card' => [
                    'number'    => $request->cardNumber,
                    'exp_month' => $request->expiraMonth,
                    'exp_year'  => $request->expiraYear,
                    'cvc'       => $request->cardCVC,
                ],
            ] );

            $customer = $stripe->customers->create( [
                'source'   => $token,
                'name'     => $request->name,
                'email'    => $request->email,
                'metadata' => [
                    'zip_code' => $request->zipCode,
                    'country'  => $request->country,
                ],
            ] );

            $charge = $stripe->charges->create( [
                'amount'      => ( $request->amount + $platformFee ) * 100,
                'currency'    => 'usd',
                'description' => $post->title,
                'customer'    => $customer->id,
            ] );

            return $stripe->balanceTransactions->retrieve(
                $charge->balance_transaction
            );

            return back()->with( 'success', 'Donate Successfull' );

        } catch ( Exception $e ) {

            return back()->with( 'error', $e->getMessage() );
        }

    }

    public function donateSuccess() {
        return "success";
    }

    public function donateCancel() {
        return "cancel";
    }
}