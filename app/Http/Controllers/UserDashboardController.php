<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller {
    public function index() {
        $donateTotal = Donate::where('donar_id', Auth::id())->sum('amount');

        $donateFundraiserCount = Donate::where('donar_id', Auth::id())->groupBy('fundraiser_post_id')->count();
        return view('frontend.dashboard.index', compact('donateTotal', 'donateFundraiserCount'));
    }

    public function makeRole() {
        if (empty(auth()->user()->roles->toArray())) {
            return view('frontend.dashboard.makerole');
        } else {
            return redirect()->route('user.dashboard.index');
        }

    }

    public function makeDonor() {
        if (empty(auth()->user()->roles->toArray())) {
            auth()->user()->assignRole('donor');
        } elseif (auth()->user()->hasRole('fundraiser')) {
            auth()->user()->assignRole('donor');
        }
        return redirect()->route('user.dashboard.index')->with('success', 'Congratulations, Donar Profile successfully Created !');

    }

    public function makeFundraiser() {
        if (empty(auth()->user()->roles->toArray())) {
            auth()->user()->assignRole('fundraiser');
        } elseif (auth()->user()->hasRole('donor')) {
            auth()->user()->assignRole('fundraiser');
        }
        return redirect()->route('user.dashboard.index')->with('success', 'Congratulations, Fundraiser Profile successfully Created !');

    }

}