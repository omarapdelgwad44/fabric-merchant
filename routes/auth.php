<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\SignUp;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');
Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
