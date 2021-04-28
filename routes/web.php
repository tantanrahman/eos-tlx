<?php

use App\Http\Controllers\Admin\BagpackageController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DropshipController;
use App\Http\Controllers\Admin\OfficeProfileController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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
    Route::resource('bagpackage', BagpackageController::class);
    Route::resource('city', CityController::class);
    Route::resource('courier', CourierController::class);
    Route::resource('dropship', DropshipController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('country', CountryController::class);
    Route::resource('counter', CounterController::class);
    Route::resource('partner', PartnerController::class);
    Route::get('export', [App\Http\Controllers\Admin\DropshipController::class, 'export'])->name('dropship.export');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

