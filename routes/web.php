<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfficeProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('auth.login');
});

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Auth::routes();
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {
    Route::resource('/', DashboardController::class);
    Route::resource('role', RoleController::class);
    Route::resource('officeprofile', OfficeProfileController::class);
    Route::resource('user', UserController::class);
    Route::resource('register', RegisterController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

