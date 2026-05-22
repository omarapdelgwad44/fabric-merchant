<?php

use App\Livewire\InquiryManager;
use App\Livewire\InventoryManager;
use App\Livewire\OrderManager;
use App\Livewire\SettingsManager;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    // auth routes
    require __DIR__.'/auth.php';

    // Landing Page
    Route::get('/', function () {
        return view('pages.landing');
    });

    // Dashboard
    Route::middleware(['auth'])->prefix('dashboard')->group(function () {

        Route::get('/', function () {
            return view('pages.dashboard');
        });

        Route::get('/inventory', InventoryManager::class);
        Route::get('/orders', OrderManager::class);
        Route::get('/inquiries', InquiryManager::class);
        Route::get('/settings', SettingsManager::class);
    });

});
