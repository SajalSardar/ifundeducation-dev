<?php

namespace App\Http\Controllers;

class UserProfileController extends Controller {
    public function edit() {
        return view( 'frontend.dashboard.profile' );
    }
}