<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller {
    public function create() {
        return view( 'user.create' );
    }

    public function userLogin() {
        return view( 'user.login' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'   => ['required', Password::defaults()],
        ] );

        $user = User::create( [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make( $request->password ),
        ] );

        event( new Registered( $user ) );

        Auth::login( $user );
        return redirect( RouteServiceProvider::HOME );
    }
}