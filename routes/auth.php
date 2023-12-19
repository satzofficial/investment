<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitsController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::group(['name' => 'datatables'], function () {
        // Customer
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');

        Route::post('customers-axios', [CustomerController::class, 'XHRtable'])->name('customers.axios');

        Route::get('add-customers', [CustomerController::class, 'create'])->name('customers.add');

        Route::post('add-customers-create', [CustomerController::class, 'store'])->name('customers.create');

        Route::post('add-customers-delete/{id?}', [CustomerController::class, 'destroy'])->name('customers.destroy');

        Route::post('add-customers-status/{id?}', [CustomerController::class, 'status'])->name('customers.status');
    });

    Route::group(['name' => 'datatables'], function () {
        // Items
        Route::get('units', [UnitsController::class, 'index'])->name('units.index');

        Route::post('units-edit/{id?}', [UnitsController::class, 'edit'])->name('units.edit');

        Route::post('units-store/', [UnitsController::class, 'store'])->name('units.store');

        Route::post('units-update/{id?}', [UnitsController::class, 'update'])->name('units.update');

        Route::post('units-delete/{id?}', [UnitsController::class, 'destroy'])->name('units.destroy');
    });


    Route::group(['name' => 'category'], function () {
        // Items
        Route::get('category', [CategoryController::class, 'index'])->name('category.index');

        Route::post('category-edit/{id?}', [CategoryController::class, 'edit'])->name('category.edit');

        Route::post('category-store/', [CategoryController::class, 'store'])->name('category.store');

        Route::post('category-update/{id?}', [CategoryController::class, 'update'])->name('category.update');

        Route::post('category-delete/{id?}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});
