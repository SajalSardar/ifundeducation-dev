<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\Wishlist;

class FrontController extends Controller {
    public function index() {

        $fundRaiserPosts = FundraiserPost::with( 'fundraisercategories', 'user.academic_profile.university' )->where( 'status', true )->orderBy( 'id', 'desc' )->get();

        $wishlists_id = Wishlist::where( 'user_id', auth()->user()->id ?? '' )->pluck( 'fundraiser_post_id' )->all();
        return view( 'frontend.index', compact( 'fundRaiserPosts', 'wishlists_id' ) );
    }

}