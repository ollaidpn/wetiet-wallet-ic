<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\TransfertController;
use App\Http\Controllers\Api\TokenizerController;
use App\Http\Controllers\Api\RefuelingController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserFavoritesController;
use App\Http\Controllers\Api\UserRefuelingsController;
use App\Http\Controllers\Api\UserTransfertsController;
use App\Http\Controllers\Api\ShopRefuelingsController;
use App\Http\Controllers\Api\UserTransactionsController;
use App\Http\Controllers\Api\ShopTransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        // User Favorises
        Route::get('/users/{user}/favorites', [
            UserFavoritesController::class,
            'index',
        ])->name('users.favorites.index');
        Route::post('/users/{user}/favorites', [
            UserFavoritesController::class,
            'store',
        ])->name('users.favorites.store');

        // User Refuelings
        Route::get('/users/{user}/refuelings', [
            UserRefuelingsController::class,
            'index',
        ])->name('users.refuelings.index');
        Route::post('/users/{user}/refuelings', [
            UserRefuelingsController::class,
            'store',
        ])->name('users.refuelings.store');

        // User Transactions
        Route::get('/users/{user}/transactions', [
            UserTransactionsController::class,
            'index',
        ])->name('users.transactions.index');
        Route::post('/users/{user}/transactions', [
            UserTransactionsController::class,
            'store',
        ])->name('users.transactions.store');

        // User Transferts
        Route::get('/users/{user}/transferts', [
            UserTransfertsController::class,
            'index',
        ])->name('users.transferts.index');
        Route::post('/users/{user}/transferts', [
            UserTransfertsController::class,
            'store',
        ])->name('users.transferts.store');

        Route::apiResource('transferts', TransfertController::class);

        Route::apiResource('tokenizers', TokenizerController::class);

        Route::apiResource('transactions', TransactionController::class);

        Route::apiResource('shops', ShopController::class);

        // Shop Refuelings
        Route::get('/shops/{shop}/refuelings', [
            ShopRefuelingsController::class,
            'index',
        ])->name('shops.refuelings.index');
        Route::post('/shops/{shop}/refuelings', [
            ShopRefuelingsController::class,
            'store',
        ])->name('shops.refuelings.store');

        // Shop Transactions
        Route::get('/shops/{shop}/transactions', [
            ShopTransactionsController::class,
            'index',
        ])->name('shops.transactions.index');
        Route::post('/shops/{shop}/transactions', [
            ShopTransactionsController::class,
            'store',
        ])->name('shops.transactions.store');

        Route::apiResource('refuelings', RefuelingController::class);

        Route::apiResource('settings', SettingController::class);

        Route::apiResource('favorites', FavoriteController::class);
    });
