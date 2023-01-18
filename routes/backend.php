<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\FundraiserCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware( ['auth', 'verified', 'role:super-admin|admin'] )->prefix( 'dashboard' )->name( 'dashboard.' )->group( function () {

    Route::get( '/', [BackendController::class, 'index'] )->name( 'index' );

    Route::controller( FundraiserCategoryController::class )->prefix( 'fundraiser-category' )->name( 'fundraiser.category.' )->group( function () {
        Route::get( '/fundraiser-category', 'index' )->name( 'index' );
        Route::post( '/fundraiser-category/store', 'store' )->name( 'store' );
    } );
} );