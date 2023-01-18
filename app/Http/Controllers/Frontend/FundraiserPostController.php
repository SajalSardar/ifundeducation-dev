<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserCategory;
use App\Models\FundraiserPost;
use Illuminate\Http\Request;

class FundraiserPostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = FundraiserCategory::orderBy( 'id', 'desc' )->where( 'status', true )->get();
        return view( 'frontend.fundraiser_post.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function show( FundraiserPost $fundraiserPost ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function edit( FundraiserPost $fundraiserPost ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, FundraiserPost $fundraiserPost ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundraiserPost  $fundraiserPost
     * @return \Illuminate\Http\Response
     */
    public function destroy( FundraiserPost $fundraiserPost ) {
        //
    }
}