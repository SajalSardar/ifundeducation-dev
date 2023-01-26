<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $wishlists = Wishlist::with( 'fundraiser_post:id,title,slug,image' )->where( 'user_id', auth()->user()->id )->orderBy( 'id', 'desc' )->paginate( 30 );
        return view( 'frontend.wishlist.index', compact( 'wishlists' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'post_id' => 'required',
        ] );

        if ( $validator->fails() ) {
            return back()->with( 'error', "Somthing Wrong!" );
        }

        $data = Wishlist::updateOrCreate( [
            'fundraiser_post_id' => $request->post_id,
        ], [
            'user_id'            => auth()->user()->id,
            'fundraiser_post_id' => $request->post_id,
        ] );

        if ( $data ) {
            return back()->with( 'success', 'Added Wishlist Successfully!' );
        } else {
            return back()->with( 'error', 'Wishlist Not Added!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy( Wishlist $wishlist ) {
        $wishlist->delete();
        return back()->with( 'success', 'Wishlist Delete Successfull!' );
    }
}