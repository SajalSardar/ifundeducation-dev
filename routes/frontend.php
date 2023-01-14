<?php
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::name( 'front.' )->group( function () {

    Route::controller( FrontController::class )->group( function () {
        Route::get( '/', 'index' )->name( 'index' );
    } );

} );

Route::middleware( ['auth', 'verified', 'role:fundraiser|donor'] )->group( function () {
    Route::get( '/user/dashboard', [UserDashboardController::class, 'index'] )->name( 'user.dashboard.index' );
} );

Route::middleware( ['auth', 'verified'] )->group( function () {
    Route::controller( UserDashboardController::class )->prefix( 'user' )->name( 'make.' )->group( function () {
        Route::get( '/make/role', 'makeRole' )->name( 'role' );
        Route::get( '/make/role/donor', 'makeDonor' )->name( 'role.donor' );
        Route::get( '/make/role/fundraiser', 'makeFundraiser' )->name( 'role.fundraiser' );
    } );

    Route::controller( UserProfileController::class )->prefix( 'user/profile' )->name( 'user.profile.' )->group( function () {
        Route::get( '/edit', 'edit' )->name( 'edit' );
        Route::post( '/get/state', 'state' )->name( 'state' );
        Route::post( '/get/city', 'city' )->name( 'city' );

        Route::put( '/user/personal/profile/{id}', 'personalProfile' )->name( 'personal.update' );
        Route::put( '/user/academic/profile/{id}', 'academicProfile' )->name( 'academic.update' );
        Route::post( '/professional/experience', 'experiencePhoto' )->name( 'experience.photo.upload' );
        Route::put( '/user/social/profile/{id}', 'socialProfile' )->name( 'social.upload' );
    } );

} );

Route::get( '/google/redirect', [SocialAuthController::class, 'googleRedirect'] )->name( 'social.google.redirect' );

Route::get( '/google/callback', [SocialAuthController::class, 'googleCallback'] )->name( 'social.google.callback' );