<?php

use App\Http\Controllers\Admin\BagpackageController;
use App\Http\Controllers\Admin\BagShipmentController;
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
use App\Http\Controllers\Admin\OngkirController;
use App\Http\Controllers\Admin\PackageTypeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PickuplistController;
use App\Http\Controllers\Admin\PickupUserController;
use App\Http\Controllers\Admin\PostalCodeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\TrackingShipmentController;
use App\Http\Controllers\Admin\TrackingStatusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ShipmentDetailController;

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
    Route::resource('partner', PartnerController::class);
    Route::resource('packagetype', PackageTypeController::class);
    Route::resource('postalcode', PostalCodeController::class);
    Route::resource('shipment', ShipmentController::class);
    Route::resource('shipmentdetails', ShipmentDetailController::class);
    Route::resource('bagshipment', BagShipmentController::class);
    Route::resource('pickuplist', PickuplistController::class);
    Route::resource('pickupuser', PickupUserController::class);
    Route::resource('ongkir', OngkirController::class);
    Route::resource('tracking_status', TrackingStatusController::class);
    Route::resource('tracking_shipment', TrackingShipmentController::class);
    Route::get('export', [App\Http\Controllers\Admin\DropshipController::class, 'export'])->name('dropship.export');
    Route::get('exportShipment', [App\Http\Controllers\Admin\ShipmentController::class, 'exportShipment'])->name('shipment.export');
    Route::get('pdf', [App\Http\Controllers\Admin\DropshipController::class, 'pdf'])->name('dropship.pdf');
    Route::post('searchdateDrop', [App\Http\Controllers\Admin\DropshipController::class, 'searchdateDrop'])->name('searchdateDrop');
    Route::post('searchdateShipment', [App\Http\Controllers\Admin\DropshipController::class, 'searchdateShipment'])->name('searchdateShipment');
    Route::post('shipmentDetails', [App\Http\Controllers\Admin\ShipmentController::class, 'shipmentDetails'])->name('shipmentDetails');
    Route::get('searchmultiplepartner', [App\Http\Controllers\Admin\ShipmentController::class, 'searchmultiplepartner'])->name('searchmultiplepartner');
    Route::get('printConnote/{shipment}', [App\Http\Controllers\Admin\PrintController::class, 'printConnote'])->name('printConnote');
    Route::get('printLabel/{shipment}', [App\Http\Controllers\Admin\PrintController::class, 'printLabel'])->name('printLabel');
    Route::get('printInvoice/{shipment}', [App\Http\Controllers\Admin\PrintController::class, 'printInvoice'])->name('printInvoice');
    Route::get('printGdex/{shipment}', [App\Http\Controllers\Admin\PrintController::class, 'printgdexDev'])->name('printgdexDev');
    Route::get('apiPostalCode', [App\Http\Controllers\Admin\ApiEksContoller::class, 'apiPostalCode'])->name('apiPostalCode');
    Route::get('getCityApi', [App\Http\Controllers\Admin\ShipmentController::class, 'getCityApi'])->name('getCityApi');
});

Route::get('autocompleteCity', [App\Http\Controllers\Admin\CityController::class, 'autocompleteCity'])->name('autocompleteCity');
Route::get('autocompleteCourier', [App\Http\Controllers\Admin\CourierController::class, 'autocompleteCourier'])->name('autocompleteCourier');
Route::get('autocompleteCountry', [App\Http\Controllers\Admin\CountryController::class, 'autocompleteCountry'])->name('autocompleteCountry');
Route::get('autocompleteCustomer', [App\Http\Controllers\Admin\CustomerController::class, 'autocompleteCustomer'])->name('autocompleteCustomer');
Route::get('autocompleteShipmentShipper', [App\Http\Controllers\Admin\ShipmentController::class, 'autocompleteShipmentShipper'])->name('autocompleteShipmentShipper');
Route::get('autocompleteShipmentConsignee', [App\Http\Controllers\Admin\ShipmentController::class, 'autocompleteShipmentConsignee'])->name('autocompleteShipmentConsignee');
Route::get('getCustomerId', [App\Http\Controllers\Admin\CustomerController::class, 'getCustomerId'])->name('getCustomerId');
Route::get('getConnote', [App\Http\Controllers\Admin\ShipmentController::class, 'getConnote'])->name('getConnote');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



