<?php

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Route;

Route::middleware( ['auth', 'verified', 'role:super-admin|admin'] )->group( function () {

    Route::get( '/dashboard', [BackendController::class, 'index'] )->name( 'dashboard.index' );
} );