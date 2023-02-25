<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Donate;
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

        $request->validate( [
            "cardNumber"  => 'required|min:19',
            "expiraMonth" => 'required|numeric|digits_between:1,2',
            "expiraYear"  => 'required|numeric|digits:2',
            "cardCVC"     => 'required|numeric|digits:3',
            "name"        => 'required',
            "email"       => 'required|email',
            "zipCode"     => 'required|numeric',
            "country"     => 'required',
            "amount"      => 'required|integer|min:10',
        ] );

        $platformFee = ( $request->amount * 3.5 ) / 100;

        $post = FundraiserPost::find( $request->post_id );

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
                'amount'      => round(  ( $request->amount + $platformFee ) * 100 ),
                'currency'    => 'usd',
                'description' => $post->title,
                'customer'    => $customer->id,
            ] );

            $transaction = $stripe->balanceTransactions->retrieve(
                $charge->balance_transaction
            );

            $platform_fee = (  ( $transaction->net / 100 ) * 3.5 ) / 100;

            Donate::create( [
                "donar_id"               => auth()->user()->id ?? null,
                'donar_name'             => $request->name,
                'donar_email'            => $request->email,
                "fundraiser_post_id"     => $request->post_id,
                "charge_id"              => $charge->id,
                "balance_transaction_id" => $transaction->id,
                "amount"                 => $transaction->amount / 100,
                "stripe_fee"             => $transaction->fee / 100,
                "net_balance"            => ( $transaction->net / 100 ) - $platform_fee,
                "platform_fee"           => $platform_fee,
                "currency"               => 'usd',
                "display_publicly"       => $request->is_display_info === "on" ? "no" : "yes",
            ] );

            return redirect()->route( 'front.fundraiser.post.show', $post->slug )->with( 'success', 'Donate Successfull' );

        } catch ( Exception $e ) {

            return back()->with( 'error', $e->getMessage() );
        }

    }

}