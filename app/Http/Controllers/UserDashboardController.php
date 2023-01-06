<?php

namespace App\Http\Controllers;

class UserDashboardController extends Controller {
    public function index() {
        return view( 'frontend.dashboard.index' );
    }

    public function makeRole() {
        if ( empty( auth()->user()->roles->toArray() ) ) {
            return view( 'frontend.dashboard.makerole' );
        } else {
            return redirect()->route( 'user.dashboard.index' );
        }

    }

    public function makeDonor() {
        if ( empty( auth()->user()->roles->toArray() ) ) {
            auth()->user()->assignRole( 'donor' );
        } elseif ( auth()->user()->hasRole( 'fundraiser' ) ) {
            auth()->user()->assignRole( 'donor' );
        }
        return redirect()->route( 'user.dashboard.index' );

    }

    public function makeFundraiser() {
        if ( empty( auth()->user()->roles->toArray() ) ) {
            auth()->user()->assignRole( 'fundraiser' );
        } elseif ( auth()->user()->hasRole( 'donor' ) ) {
            auth()->user()->assignRole( 'fundraiser' );
        }
        return redirect()->route( 'user.dashboard.index' );

    }

}