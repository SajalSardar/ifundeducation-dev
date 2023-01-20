<?php
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\FundraiserPostController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::name( 'front.' )->group( function () {

    Route::controller( FrontController::class )->group( function () {
        Route::get( '/', 'index' )->name( 'index' );
        Route::get( '/fundraiser/post/{slug}/show', 'fundraiserPostShow' )->name( 'fundraiser.post.show' );
    } );

} );

Route::middleware( ['auth', 'verified', 'role:fundraiser|donor'] )->group( function () {
    Route::get( '/user/dashboard', [UserDashboardController::class, 'index'] )->name( 'user.dashboard.index' );

    Route::controller( UserProfileController::class )->prefix( 'user/profile' )->name( 'user.profile.' )->group( function () {
        Route::get( '/edit', 'edit' )->name( 'edit' );
        Route::post( '/get/state', 'state' )->name( 'state' );
        Route::post( '/get/city', 'city' )->name( 'city' );

        Route::put( '/personal/{id}', 'personalProfile' )->name( 'personal.update' );
        Route::put( '/social/{id}', 'socialProfile' )->name( 'social.upload' );
    } );

} );

Route::middleware( ['auth', 'verified', 'role:fundraiser'] )->group( function () {
    Route::controller( FundraiserPostController::class )->prefix( 'fundraiser/post' )->name( 'fundraiser.post.' )->group( function () {
        Route::get( '/', 'index' )->name( 'index' );
        Route::get( '/create', 'create' )->name( 'create' );
        Route::post( '/store', 'store' )->name( 'store' );
        Route::get( '/edit/{fundraiserpost}', 'edit' )->name( 'edit' );
        Route::put( '/update/{fundraiserpost}', 'update' )->name( 'update' );
        Route::delete( '/delete/{fundraiserpost}', 'destroy' )->name( 'delete' );
        Route::post( '/store/story/image', 'storyPhoto' )->name( 'story.photo.upload' );
    } );

    Route::controller( UserProfileController::class )->prefix( 'user/profile' )->name( 'user.profile.' )->group( function () {
        Route::put( '/academic/{id}', 'academicProfile' )->name( 'academic.update' );
        Route::post( '/professional/experience', 'experiencePhoto' )->name( 'experience.photo.upload' );
    } );

} );

Route::middleware( ['auth', 'verified'] )->group( function () {
    Route::controller( UserDashboardController::class )->prefix( 'user' )->name( 'make.' )->group( function () {
        Route::get( '/make/role', 'makeRole' )->name( 'role' );
        Route::get( '/make/role/donor', 'makeDonor' )->name( 'role.donor' );
        Route::get( '/make/role/fundraiser', 'makeFundraiser' )->name( 'role.fundraiser' );
    } );

} );