<?php

use App\Http\Controllers\API\User\AuthController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth/user'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/premium-register', [AuthController::class, 'premium_register'])->name('premium_register');
    Route::post('/premium-billing-info', [AuthController::class, 'premium_billing_info'])->middleware('auth:api')->name('premium_billing_info');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::get('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::group([
    'middleware' => ['api', 'auth:api'],
    'prefix' => 'api'
], function ($router) {
    Route::group(['prefix' => 'quote-request'], function ($router) {
        Route::get('/all', [QuoteRequestController::class, 'index'])->name('all_requests');
        Route::get('/allByUser', [QuoteRequestController::class, 'getByUser'])->name('all_requests_by_user');
        Route::get('/allByCompany/{company_id}', [QuoteRequestController::class, 'getByCompany'])->name('all_requests_by_company');
        Route::post('/updateRequest', [QuoteRequestController::class, 'updateRequest'])->name('updateRequest');
        Route::post('/updateAddress', [QuoteRequestController::class, 'updateAddress'])->name('updateAddress');
        Route::post('/submit', [QuoteRequestController::class, 'store'])->name('store_request');
    });
});
