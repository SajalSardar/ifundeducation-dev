<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $comments = Comment::whereHas( 'fundraiserpost', function ( $q ) {
            $q->where( 'user_id', auth()->user()->id );
        } )->orderBy( 'created_at', 'desc' )->get();

        return view( 'frontend.comment.index', compact( 'comments' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        if ( !Auth::check() ) {
            $request->validate( [
                'name'    => 'required',
                'email'   => 'required',
                'comment' => 'required|max:300',
            ] );

        } else {
            $request->validate( [
                'comment' => 'required|max:300',
            ] );
        }

        Comment::create( [
            'fundraiser_post_id' => $request->post_id,
            'user_id'            => auth()->user()->id ?? null,
            'name'               => auth()->user()->first_name ?? $request->name,
            'email'              => auth()->user()->email ?? $request->email,
            'comment'            => $request->comment,
        ] );
        return back()->with( 'success', 'Comment Successfull!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show( Comment $comment ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit( Comment $comment ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Comment $comment ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy( Comment $comment ) {
        $comment->delete();
        return back()->with( 'success', 'Status Delete Successfull!' );
    }

    /**
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate( Comment $comment ) {
        if ( $comment->status == 'approved' ) {
            $comment->update( [
                'status' => 'unapproved',
            ] );
        } else {
            $comment->update( [
                'status' => 'approved',
            ] );
        }

        return back()->with( 'success', 'Status Update Successfull!' );

    }
}