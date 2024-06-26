<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CommonPageController;
use App\Http\Controllers\Backend\ContactMessageController;
use App\Http\Controllers\Backend\ContactPageController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FaqPageController;
use App\Http\Controllers\Backend\FooterMenuController;
use App\Http\Controllers\Backend\FundraiserCategoryController;
use App\Http\Controllers\Backend\FundraiserPostController;
use App\Http\Controllers\Backend\Home2ColumnBlockController;
use App\Http\Controllers\Backend\Home3ColumnBlockController;
use App\Http\Controllers\Backend\HomePageBannerController;
use App\Http\Controllers\Backend\SiteSocialLinkController;
use App\Http\Controllers\Backend\ThemeOptionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\StripeConnectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:super-admin|admin'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [BackendController::class, 'index'])->name('index');

    Route::controller(FundraiserPostController::class)->prefix('campaign')->name('fundraiser.campaign.')->group(function () {
        Route::get('/running', 'runningCampaign')->name('campaign.all');
        Route::get('/datatable/running', 'runningCampaignDatatable')->name('campaign.all.datatable');

        Route::get('/pending', 'pendingCampaign')->name('campaign.pending');
        Route::get('/datatable/pending', 'pendingCampaignDatatable')->name('campaign.pending.datatable');

        Route::get('/completed', 'completedCampaign')->name('campaign.completed');
        Route::get('/datatable/completed', 'completedCampaignDatatable')->name('campaign.completed.datatable');

        Route::get('/block', 'blockCampaign')->name('campaign.block');
        Route::get('/datatable/block', 'blockCampaignDatatable')->name('campaign.block.datatable');

        Route::get('/stop', 'stopCampaign')->name('campaign.stop');
        Route::get('/datatable/stop', 'stopCampaignDatatable')->name('campaign.stop.datatable');

        Route::get('/reviewed', 'reviewedCampaign')->name('campaign.reviewed');
        Route::get('/datatable/reviewed', 'reviewedCampaignDatatable')->name('campaign.reviewed.datatable');

        Route::get('/update-request', 'updateCampaign')->name('campaign.update.request');
        Route::get('/update-request-datatable', 'updateCampaignDatatable')->name('campaign.update.datatable');
        Route::get('/update-request/{slug}', 'updateCampaignShow')->name('campaign.update.request.show');

        Route::get('/{slug}', 'showCampaign')->name('campaign.show');
        Route::post('/campaign-status-update', 'statusChangeCampaign')->name('campaign.status');

        Route::post('/request-campaign-status-update', 'fundraiserRequestUpdate')->name('request.campaign.update');
    });

    Route::controller(StripeConnectController::class)->prefix('payout')->name('fundraiser.payout.')->group(function () {
        Route::get('/list', 'payoutListAdmin')->name('list');
        Route::get('/details/{id}', 'payoutdetailsAdmin')->name('details');
        Route::post('/connect-transfer', 'stripeConnectTransfer')->name('connect.transfer');
    });

    Route::controller(FundraiserCategoryController::class)->prefix('fundraiser-category')->name('fundraiser.category.')->group(function () {
        Route::get('/fundraiser-category', 'index')->name('index');
        Route::post('/fundraiser-category/store', 'store')->name('store');
    });

    // user management routs
    Route::controller(UserController::class)->prefix('/user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('allusers');
        Route::get('/block/{id}', 'userBlock')->name('block');
        Route::get('/active/{id}', 'userActive')->name('active');
    });

    Route::prefix('/pages')->name('pages.')->group(function () {

        Route::controller(CommonPageController::class)->prefix('all-pages')->name('all-pages.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{slug}', 'edit')->name('edit');
            Route::put('/update/{commonPage}', 'update')->name('update');
            Route::get('/image/delete/{commonPage}', 'imageDelete')->name('image.delete');
        });

        Route::controller(ContactPageController::class)->prefix('contact-page')->name('contact-page.')->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::post( '/store', 'store' )->name( 'store' );
            Route::put('/update/{contactPage}', 'update')->name('update');
            Route::get('/image/delete/{contactPage}', 'imageDelete')->name('image.delete');
        });

        Route::controller(FaqPageController::class)->prefix('faq-page')->name('faq-page.')->group(function () {
            Route::get('/', 'index')->name('index');
            // Route::post( '/store', 'store' )->name( 'store' );
            Route::put('/update/{faqPage}', 'update')->name('update');
            Route::get('/image/delete/{faqPage}', 'imageDelete')->name('image.delete');
        });

        Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{faq}', 'edit')->name('edit');
            Route::put('/update/{faq}', 'update')->name('update');
            Route::delete('/delete/{faq}', 'destroy')->name('delete');
        });

    });

    Route::prefix('/page-options')->name('page-options.')->group(function () {

        Route::controller(HomePageBannerController::class)->prefix('home-page-banner')->name('home-page-banner.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{homePageBanner}', 'edit')->name('edit');
            Route::put('/update/{homePageBanner}', 'update')->name('update');
            Route::delete('/delete/{homePageBanner}', 'destroy')->name('delete');
        });

        Route::controller(Home3ColumnBlockController::class)->prefix('home-3-column-block')->name('home-3-column-block.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{iconTextBox}', 'edit')->name('edit');
            Route::put('/update/{iconTextBox}', 'update')->name('update');
        });

        Route::controller(Home2ColumnBlockController::class)->prefix('home-2-column-block')->name('home-2-column-block.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{iconTextBox2Col}', 'edit')->name('edit');
            Route::put('/update/{iconTextBox2Col}', 'update')->name('update');
        });

        Route::controller(FooterMenuController::class)->prefix('footer-menu')->name('footer-menu.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{footerMenu}', 'edit')->name('edit');
            Route::put('/update/{footerMenu}', 'update')->name('update');
            Route::delete('/delete/{footerMenu}', 'destroy')->name('delete');
        });

        Route::controller(SiteSocialLinkController::class)->prefix('site-social-links')->name('site-social-links.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{siteSocialLink}', 'edit')->name('edit');
            Route::put('/update/{siteSocialLink}', 'update')->name('update');
            Route::delete('/delete/{siteSocialLink}', 'destroy')->name('delete');
        });

    });

    Route::controller(ThemeOptionController::class)->prefix('theme-options')->name('theme-options.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{themeOption}', 'update')->name('update');
    });

    Route::controller(ContactMessageController::class)->prefix('contact-messages')->name('contact-messages.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
        Route::get('/show/{contactMessage}', 'show')->name('show');
        Route::delete('/permanent/delete/{id?}', 'permanentDestroy')->name('permanent.destroy');
    });

});
