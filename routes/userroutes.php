<?php

use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\DonateController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\FundraiserPostController;
use App\Http\Controllers\Frontend\FundraiserUpdateMessageController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\StripeConnectController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/account-block', function () {
    return view('user.active_deactive');
})->name('account.blocked');

Route::name('front.')->group(function () {

    Route::controller(FrontController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/page/{slug?}', 'CommonPage')->name('page');

        Route::get('/contact', 'contact')->name('contact');
        Route::post('/contact/store', 'contactStore')->name('contact.store');

        Route::get('/fundraiser', 'fundraiser')->name('fundraiser');
        Route::get('/fundraiser/s/', 'fundraiserSearch')->name('fundraiser.search');
        Route::get('/faq', 'faq')->name('faq');
    });

    Route::get('/fundraiser-post/{slug}', [FundraiserPostController::class, 'fundraiserPostShow'])->name('fundraiser.post.show');
    Route::post('/comment/post', [CommentController::class, 'store'])->name('comment.store');

    Route::controller(DonateController::class)->group(function () {
        Route::get('donate/fundraiser/{slug}', 'create')->name('stripe.donate');
        Route::post('donate-fundraiser', 'donatePost')->name('donate.post');

    });

});

Route::middleware(['auth', 'verified', 'userStatus', 'role:fundraiser|donor'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard.index');

    Route::controller(UserProfileController::class)->prefix('user/profile')->name('user.profile.')->group(function () {
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/get/state', 'state')->name('state');
        Route::post('/get/city', 'city')->name('city');

        Route::put('/personal/{id}', 'personalProfile')->name('personal.update');
        Route::put('/social/{id}', 'socialProfile')->name('social.upload');
    });

    Route::controller(WishlistController::class)->prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{wishlist}', 'destroy')->name('destroy');
        Route::get('wishlist-data-table', 'listDataTable')->name('datatable');
    });

});

Route::middleware(['auth', 'verified', 'userStatus', 'role:fundraiser'])->group(function () {
    Route::controller(FundraiserPostController::class)->prefix('fundraiser/post')->name('fundraiser.post.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{fundraiserpost}', 'edit')->name('edit');
        Route::put('/update/{fundraiserpost}', 'update')->name('update');
        Route::delete('/delete/{fundraiserpost}', 'destroy')->name('delete');
        Route::post('/store/story/image', 'storyPhoto')->name('story.photo.upload');
        Route::get('/show/{fundraiserpost}', 'show')->name('show');
        Route::get('/stop/campaign/{fundraiserpost}', 'stopRunning')->name('stop');
        Route::get('/running/campaign/{fundraiserpost}', 'stopRunning')->name('running');
        Route::get('/post-datatable', 'postDataTable')->name('datatable');
        Route::get('/single-donation/{fundraiserpost}', 'singleDonationDataTable')->name('single.donation.datatable');
        Route::get('/single-comments/{fundraiserpost}', 'singleCommentsDataTable')->name('single.comments.datatable');
        Route::get('/single-updatemessage/{fundraiserpost}', 'singleUpdatemessageDataTable')->name('single.updatemessage.datatable');
    });

    Route::controller(UserProfileController::class)->prefix('user/profile')->name('user.profile.')->group(function () {
        Route::put('/academic/{id}', 'academicProfile')->name('academic.update');
        Route::post('/professional/experience', 'experiencePhoto')->name('experience.photo.upload');
    });

    Route::controller(FundraiserUpdateMessageController::class)->prefix('fundraiser/post/message')->name('fundraiser.post.message.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/post/message-list-datatable', 'listDataTable')->name('index.datatable');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{fundraiserupdatemessage}', 'edit')->name('edit');
        Route::put('/update/{fundraiserupdatemessage}', 'update')->name('update');
        Route::delete('/delete/{fundraiserupdatemessage}', 'destroy')->name('delete');
    });
    Route::controller(CommentController::class)->prefix('fundraiser/comment')->name('fundraiser.comment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{comment}', 'update')->name('update');
        Route::delete('/delete/{comment}', 'destroy')->name('delete');
        Route::get('/status-update/{comment}', 'statusUpdate')->name('status.update');
        Route::post('/replay', 'replay')->name('replay');
    });
    Route::controller(DonateController::class)->group(function () {
        Route::get('all/donation/list', 'index')->name('donate.index');
        Route::get('donation-list-datatable', 'listDataTabel')->name('donate.index.datatable');

    });

    Route::controller(StripeConnectController::class)->group(function () {
        Route::get('withdrawals', 'index')->name('withdrawals.index');
        Route::get('withdrawal-datatable', 'listDataTable')->name('withdrawals.index.datatable');
        Route::get('stripe/account', 'stripeConnectAccount')->name('withdrawals.stripe.account');
        Route::get('stripe/account/login', 'stripeConnectLogin')->name('withdrawals.stripe.login');
        Route::post('payout/verify', 'verifyPayoutEmail')->name('withdrawals.verify');
        Route::get('payout/verify/code', 'verifyCodeForm')->name('withdrawals.verify.code.form');
        Route::post('payout/verify/code/submit', 'verifyCodeSubmit')->name('withdrawals.verify.code.submit');
        Route::get('payout/view', 'payoutView')->name('withdrawals.payout.view');
        Route::post('payout/request', 'payoutRequest')->name('withdrawals.payout.request');
    });

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(UserDashboardController::class)->prefix('user')->name('make.')->group(function () {
        Route::get('/make/role', 'makeRole')->name('role');
        Route::get('/make/role/donor', 'makeDonor')->name('role.donor');
        Route::get('/make/role/fundraiser', 'makeFundraiser')->name('role.fundraiser');
    });

});
