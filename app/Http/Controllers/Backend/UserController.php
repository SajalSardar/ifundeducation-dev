<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {
    //

    public function index() {
        $users = User::orderBy( 'id', 'desc' )->paginate( 25 );
        return view( 'backend.user.index', compact( 'users' ) );
    }
}
