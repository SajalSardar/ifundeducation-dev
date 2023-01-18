<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FundraiserCategory;
use Illuminate\Http\Request;

class FundraiserCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = FundraiserCategory::orderBy( 'id', 'desc' )->get();
        return view( 'backend.fundraiser_category.index', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required|unique:fundraiser_categories,name',
        ] );
        $insert = FundraiserCategory::create( [
            'name' => $request->name,
        ] );
        if ( $insert ) {
            return back()->with( 'success', 'Cateogry Insert Successfull!' );
        } else {
            return back()->with( 'error', 'Cateogry Insert Error!' );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundraiserCategory  $fundraiserCategory
     * @return \Illuminate\Http\Response
     */
    public function show( FundraiserCategory $fundraiserCategory ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundraiserCategory  $fundraiserCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( FundraiserCategory $fundraiserCategory ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundraiserCategory  $fundraiserCategory
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, FundraiserCategory $fundraiserCategory ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundraiserCategory  $fundraiserCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( FundraiserCategory $fundraiserCategory ) {
        //
    }
}