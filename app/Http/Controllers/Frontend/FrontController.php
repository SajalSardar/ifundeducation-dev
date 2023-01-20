<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;

class FrontController extends Controller {
    public function index() {

        $fundRaiserPosts = FundraiserPost::with( 'fundraisercategories', 'user.academic_profile.university' )->where( 'status', true )->orderBy( 'id', 'desc' )->get();

        return view( 'frontend.index', compact( 'fundRaiserPosts' ) );
    }

    public function fundraiserPostShow( $slug ) {

        $fundRaiserPost = FundraiserPost::with( 'fundraisercategories' )->where( 'slug', $slug )->firstOrfail();
        return view( 'frontend.fundraiser_post.show', compact( 'fundRaiserPost' ) );
    }
}