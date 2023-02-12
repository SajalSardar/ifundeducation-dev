<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserPost;
use App\Models\FundraiserUpdateMessage;
use Illuminate\Http\Request;

class FundraiserUpdateMessageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts    = FundraiserPost::where( 'user_id', auth()->user()->id )->get( ['id', 'title'] );
        $messages = FundraiserUpdateMessage::with( 'fundraiserpost:id,title' )->orderBy( 'updated_at', 'desc' )->paginate( 30 )->groupBy( 'fundraiserpost.title' );

        return view( 'frontend.post_message.index', compact( 'posts', 'messages' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'fundraiser_post' => 'required',
            'message_type'    => 'required',
            'update_message'  => 'required|max:150',
        ], [
            'fundraiser_post.required' => 'Select Fundraiser Post',
            'message_type.required'    => 'Select Fundraiser Message Type',
            'update_message.required'  => 'Enter Fundraiser Message',
        ] );

        FundraiserUpdateMessage::create( [
            'user_id'            => auth()->user()->id,
            'fundraiser_post_id' => $request->fundraiser_post,
            'message'            => $request->update_message,
            'message_type'       => $request->message_type,
        ] );

        return response()->json( ['success' => 'Message Insert Successfull!'] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundraiserUpdateMessage  $fundraiserUpdateMessage
     * @return \Illuminate\Http\Response
     */
    public function edit( FundraiserUpdateMessage $fundraiserupdatemessage ) {
        $posts = FundraiserPost::where( 'user_id', auth()->user()->id )->get( ['id', 'title'] );
        return view( 'frontend.post_message.edit', compact( 'fundraiserupdatemessage', 'posts' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundraiserUpdateMessage  $fundraiserUpdateMessage
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, FundraiserUpdateMessage $fundraiserupdatemessage ) {
        $request->validate( [
            'fundraiser_post' => 'required',
            'message_type'    => 'required',
            'update_message'  => 'required|max:150',
        ], [
            'fundraiser_post.required' => 'Select Fundraiser Post',
            'message_type.required'    => 'Select Fundraiser Message Type',
            'update_message.required'  => 'Enter Fundraiser Message',
        ] );

        $update = $fundraiserupdatemessage->update( [
            'fundraiser_post_id' => $request->fundraiser_post,
            'message'            => $request->update_message,
            'message_type'       => $request->message_type,
        ] );
        if ( $update ) {
            return redirect()->route( 'fundraiser.post.message.index' )->with( 'success', 'Update Successfull!' );
        } else {
            return redirect()->route( 'fundraiser.post.message.index' )->with( 'error', 'Update Failed!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundraiserUpdateMessage  $fundraiserupdatemessage
     * @return \Illuminate\Http\Response
     */
    public function destroy( FundraiserUpdateMessage $fundraiserupdatemessage ) {
        $fundraiserupdatemessage->delete();
        return back()->with( 'success', 'Message Deleted Successfull!' );
    }
}