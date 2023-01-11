<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\UserPersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller {
    public function edit() {
        $countries = Country::all();
        // $states    = State::all();
        // $cities    = City::select( 'id', 'name' )->get();
        return view( 'frontend.dashboard.profile', compact( 'countries' ) );
    }

    public function personalProfile( Request $request, $id ) {
        $countries = UserPersonalProfile::find( $id );
        $user      = User::find( auth()->user()->id );
        $image     = $request->file( 'photo' );

        $request->validate( [
            "fname"    => 'required',
            "lname"    => 'nullable',
            "email"    => 'required|unique:users,email,' . auth()->user()->id,
            "phone"    => 'required',
            "birthday" => 'required',
            "gender"   => 'required',
            "address"  => 'nullable',
            "country"  => 'nullable',
            "state"    => 'nullable',
            "city"     => 'nullable',
            "zip"      => 'nullable',
            "photo"    => 'nullable|image|mimes:jpg,png|max:300',
        ] );

        if ( $image ) {
            if ( file_exists( public_path( 'storage/profile_photo/' . $user->photo ) ) ) {
                Storage::delete( 'profile_photo/' . $user->photo );
            }
            $image_name = Str::uuid() . '.' . $image->extension();

            $upload = Image::make( $image )->resize( 150, 150 )->save( public_path( 'storage/profile_photo/' . $image_name ) );
        } else {
            $image_name = $user->photo;
        }

        $user->update( [
            "first_name" => $request->fname,
            "last_name"  => $request->lname,
            "email"      => $request->email,
            "photo"      => $image_name,
        ] );

        UserPersonalProfile::updateOrCreate( [
            'user_id' => auth()->user()->id,
        ], [
            'user_id'    => auth()->user()->id,
            'phone'      => $request->phone,
            'birthday'   => $request->birthday,
            'gender'     => $request->gender,
            'address'    => $request->address,
            'country_id' => $request->country,
            'state_id'   => $request->state,
            'city_id'    => $request->city,
            'zip_code'   => $request->zip,
        ] );

        return back();

    }

    public function state( Request $request ) {
        $states = State::where( 'country_id', $request->country_id )->get();

        $state_option = ['<option selected disabled>Select State</option>'];

        foreach ( $states as $state ) {
            $state_option[] = '<option value="' . $state->id . '"' . ( !empty( auth()->user()->personal_profile->state->id ) && auth()->user()->personal_profile->state->id === $state->id ? 'selected' : '' ) . '>' . $state->name . '</option>';

        }

        return response()->json( $state_option );

    }

    public function city( Request $request ) {
        $cities = City::where( 'state_id', $request->state_id )->get();

        $city_option = ['<option selected disabled>Select City</option>'];
        foreach ( $cities as $city ) {
            $city_option[] = '<option value="' . $city->id . '"' . ( !empty( auth()->user()->personal_profile->city->id ) && auth()->user()->personal_profile->city->id === $city->id ? 'selected' : '' ) . '>' . $city->name . '</option>';

        }
        return response()->json( $city_option );
    }

}