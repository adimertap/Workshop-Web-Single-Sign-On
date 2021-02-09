<?php

use Illuminate\Support\Facades\Route;

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





// ------------------------------------------------------------------------------------------------------------------
// MODUL INVENTORY
// DASHBOARD
Route::prefix('inventory')
->namespace('Inventory')
->group(function() {
    Route::get('/', 'DashboardinventoryController@index')
        ->name('dashboardinventory');
});

// MASTERDATA INVENTORY -------------------------------------------------------------------------------------------------
Route::prefix('inventory/sparepart')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatasparepartController@index')
        ->name('masterdatasparepart');
    
    Route::resource('sparepart', 'MasterdatasparepartController');
});

Route::prefix('inventory/merksparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function() {
        Route::get('/', 'MasterdatamerksparepartController@index')
            ->name('masterdatamerksparepart');
            
        Route::resource('merk-sparepart', 'MasterdatamerksparepartController');
    });

Route::prefix('inventory/jenissparepart')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatajenissparepartController@index')
        ->name('masterdatajenissparepart');

    Route::resource('jenis-sparepart', 'MasterdataJenissparepartController');
});

Route::prefix('inventory/supplier')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatasupplierController@index')
        ->name('masterdatasupplier');
    
    Route::resource('supplier', 'MasterdatasupplierController');
});

Route::prefix('inventory/hargasparepart')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatahargasparepartController@index')
        ->name('masterdatahargasparepart');

    Route::resource('hargasparepart', 'MasterdatahargasparepartController');
});

Route::prefix('inventory/rak')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatarakController@index')
        ->name('masterdatarak');
    
    Route::resource('rak', 'MasterdatarakController');
});

Route::prefix('inventory/konversi')
->namespace('Inventory\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatakonversiController@index')
        ->name('masterdatakonversi');
    
    Route::resource('konversi', 'MasterdatakonversiController');
});



// ------------------------------------------------------------------------------------------------------------------------- 
// MODUL KEPEGAWAIAN
// DASHBOARD
Route::prefix('kepegawaian')
    ->namespace('Kepegawaian')
    ->group(function() {
        Route::get('/', 'DashboardpegawaiController@index')
            ->name('dashboardpegawai');
    });

// MASTER DATA KEPEGAWAIAN ------------------------------------------------------------------------------------------------
Route::prefix('kepegawaian/masterdatapegawai')
->namespace('Kepegawaian\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatapegawaiController@index')
        ->name('masterdatapegawai');

    Route::resource('pegawai', 'MasterdatapegawaiController');
});

Route::prefix('kepegawaian/masterdatajabatan')
->namespace('Kepegawaian\Masterdata')
->group(function() {
    Route::get('/', 'MasterdatajabatanController@index')
        ->name('masterdatajabatan');

    Route::resource('jabatan', 'MasterdatajabatanController');
});


// ------------------------------------------------------------------------------------------------------------------------- 
// MODUL PAYROLL
// DASHBOARD
Route::prefix('payroll')
    ->namespace('payroll')
    ->group(function() {
        Route::get('/', 'DashboardpayrollController@index')
            ->name('dashboardpayroll');
    });