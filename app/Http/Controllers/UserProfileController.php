<?php

namespace App\Http\Controllers;

class UserProfileController extends Controller {
    public function create() {
        return view( 'frontend.dashboard.profile' );
    }
}