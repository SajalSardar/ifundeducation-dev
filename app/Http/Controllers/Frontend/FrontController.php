<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\Wishlist;

class FrontController extends Controller {
    public function index() {

        $fundRaiserPosts = FundraiserPost::with( [
            'fundraisercategories',
            'donates' => function ( $q ) {
                $q->select( 'id', 'amount', 'fundraiser_post_id' );
            },
            'user.academic_profile.university',
        ] )->where( 'status', "running" )->orderBy( 'id', 'desc' )->get();

        $wishlists_id = Wishlist::where( 'user_id', auth()->user()->id ?? '' )->pluck( 'fundraiser_post_id' )->all();
        return view( 'frontend.index', compact( 'fundRaiserPosts', 'wishlists_id' ) );
    }

    public function about() {
        return view( 'frontend.about' );
    }

    public function fundraiser() {
        return view( 'frontend.fundraiser' );
    }

    public function contact() {
        return view( 'frontend.contact' );
    }

    public function faq() {
        return view( 'frontend.faq' );
    }

    public function termsCondition() {
        return view( 'frontend.terms' );
    }

}