<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\TokenizerController;
use App\Http\Controllers\RefuelingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/mobile', [MobileController::class, 'index'])->name('mobile');
Route::get('/mobile/connexion', [MobileController::class, 'login'])->name('mobile.login');
Route::get('/mobile/inscription', [MobileController::class, 'register'])->name('mobile.register');
Route::get('/mobile/factures', [MobileController::class, 'payment'])->name('mobile.payments');
Route::get('/mobile/cards', [MobileController::class, 'cards'])->name('mobile.cards');


Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('transferts', TransfertController::class);
        Route::resource('tokenizers', TokenizerController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('shops', ShopController::class);
        Route::resource('refuelings', RefuelingController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('favorites', FavoriteController::class);
    });
