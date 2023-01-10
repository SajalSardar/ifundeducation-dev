<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class UserProfileController extends Controller {
    public function edit() {
        $countries = Country::all();
        $states    = State::all();
        $cities    = City::all();
        return view( 'frontend.dashboard.profile', compact( 'countries', 'states', 'cities' ) );
    }

    public function state( Request $request ) {
        $states = State::where( 'country_id', $request->country_id )->get();

        $state_option = ['<option selected disabled>Select State</option>'];
        foreach ( $states as $state ) {
            $state_option[] = '<option value="' . $state->id . '">' . $state->name . '</option>';

        }
        return response()->json( $state_option );
    }

    public function city( Request $request ) {
        $cities = City::where( 'state_id', $request->state_id )->get();

        $city_option = ['<option selected disabled>Select City</option>'];
        foreach ( $cities as $city ) {
            $city_option[] = '<option value="' . $city->id . '">' . $city->name . '</option>';

        }
        return response()->json( $city_option );
    }

}