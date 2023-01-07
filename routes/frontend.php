<?php
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::name( 'front.' )->group( function () {

    Route::controller( FrontController::class )->group( function () {
        Route::get( '/', 'index' )->name( 'index' );
    } );

    Route::controller( UserController::class )->middleware( 'guest' )->name( 'user.' )->group( function () {
        Route::get( '/user/register', 'create' )->name( 'register' );
        Route::post( '/user/register', 'store' )->name( 'register.store' );
        Route::get( '/user/login', 'userLogin' )->name( 'login' );
    } );

} );

Route::middleware( ['auth', 'verified', 'role:fundraiser|donor'] )->group( function () {
    Route::get( '/user/dashboard', [UserDashboardController::class, 'index'] )->name( 'user.dashboard.index' );
} );

Route::middleware( ['auth', 'verified'] )->group( function () {
    Route::get( '/user/make/role', [UserDashboardController::class, 'makeRole'] )->name( 'make.role' );
    Route::get( '/user/make/role/donor', [UserDashboardController::class, 'makeDonor'] )->name( 'make.role.donor' );
    Route::get( '/user/make/role/fundraiser', [UserDashboardController::class, 'makeFundraiser'] )->name( 'make.role.fundraiser' );
} );

Route::get( '/google/redirect', [SocialAuthController::class, 'googleRedirect'] )->name( 'social.google.redirect' );

Route::get( '/google/callback', [SocialAuthController::class, 'googleCallback'] )->name( 'social.google.callback' );