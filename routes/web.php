<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes([
        'register'=> false,
        'reset'=> false
    ]);
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/auth-profile/{userProfile}', [App\Http\Controllers\ProfileController::class, 'edit_profile'])->name('auth.profile'); 

    Route::get('/settings', App\Http\Controllers\SettingController::class)->name('settings');
