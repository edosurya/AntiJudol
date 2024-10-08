<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ContactUsExportController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\ParticipantExportController;



Route::prefix('admin')->middleware(['auth', 'verified'])->as('admin.')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/participants', [ParticipantController::class, 'index'])->name('participant.index');
    Route::post('/participants/export', ParticipantExportController::class)->name('participant.export');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');



    Route::middleware(['isSuperAdmin'])->group(function () {
        Route::resource('/user', UserController::class)->names('user');
    });
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::post('/submit', 'store')->name('submit');
});

require __DIR__ . '/auth.php';
