<?php

use App\Http\Controllers\AccountSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware( 'auth' )->group( function () {
    Route::controller( AccountSettingController::class, )->prefix( 'account/setting' )->name( 'account.setting.' )->group( function () {
        Route::get( '/', 'edit' )->name( 'edit' );
        Route::patch( '/', 'update' )->name( 'update' );
        // Route::delete( '/', 'destroy' )->name( 'destroy' );
    } );
} );

require __DIR__ . '/frontend.php';
require __DIR__ . '/backend.php';
require __DIR__ . '/auth.php';