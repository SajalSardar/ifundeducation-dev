<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller {
    //

    public function index() {
        $users = User::with('roles')->orderBy( 'id', 'desc' )->paginate( 25 );
        return view( 'backend.user.index', compact( 'users' ) );
    }

    public function userBlock($id){
        $user = User::findOrFail($id);
        $user->update([
            'status' => 2,
        ]);
        return back()->with('success', 'User Successfuly Deactivate!');
    }
    public function userActive($id){
        $user = User::findOrFail($id);
        $user->update([
            'status' => 1,
        ]);
        return back()->with('success', 'User Successfuly Active!');
    }
}
