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

// MODUL FRONT OFFICE
// DASHBOARD
Route::prefix('frontoffice')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'DashboardFrontOfficeController@index')
            ->name('dashboardfrontoffice');
    });

// MASTER DATA JENIS KENDARAAN
Route::prefix('frontoffice/jeniskendaraan')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataJenisKendaraanController@index')
            ->name('masterdatajeniskendaraan');

        Route::resource('jeniskendaraan', 'MasterDataJenisKendaraanController');
    });




// MODUL INVENTORY ------------------------------------------------------------------------------------ INVENTORY
// DASHBOARD
Route::prefix('inventory')
    ->namespace('Inventory')
    ->group(function () {
        Route::get('/', 'DashboardinventoryController@index')
            ->name('dashboardinventory');
    });

// MASTERDATA INVENTORY -------------------------------------------------------- Master Data Inventory
Route::prefix('inventory/sparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatasparepartController@index')
            ->name('masterdatasparepart');

        Route::get('sparepart/{id_sparepart}/gallery','MasterdatasparepartController@gallery')
            ->name('sparepart.gallery');
        
        Route::resource('sparepart', 'MasterdatasparepartController');
    });

Route::prefix('inventory/gallerysparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatagalleryController@index')
            ->name('masterdatagallery');

        Route::resource('gallery', 'MasterdatagalleryController');
    });

Route::prefix('inventory/merksparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatamerksparepartController@index')
            ->name('masterdatamerksparepart');

        Route::resource('merk-sparepart', 'MasterdatamerksparepartController');
    });

Route::prefix('inventory/jenissparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatajenissparepartController@index')
            ->name('masterdatajenissparepart');

        Route::resource('jenis-sparepart', 'MasterdataJenissparepartController');
    });

Route::prefix('inventory/supplier')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatasupplierController@index')
            ->name('masterdatasupplier');

        Route::resource('supplier', 'MasterdatasupplierController');
    });

Route::prefix('inventory/hargasparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatahargasparepartController@index')
            ->name('masterdatahargasparepart');

        Route::resource('hargasparepart', 'MasterdatahargasparepartController');
    });

Route::prefix('inventory/rak')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatarakController@index')
            ->name('masterdatarak');

        Route::resource('rak', 'MasterdatarakController');
    });

Route::prefix('inventory/konversi')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatakonversiController@index')
            ->name('masterdatakonversi');

        Route::resource('konversi', 'MasterdatakonversiController');
    });


// PURCHASE ORDER ---------------------------------------------------------------- Purchase Order
Route::prefix('inventory/pembelian')
    ->namespace('Inventory\Purchase')
    ->group(function () {
        Route::get('/', 'PurchaseorderController@index')
            ->name('purchaseorder');

        Route::resource('purchase-order', 'PurchaseorderController');
    });

Route::prefix('inventory/approvalpembelian')
    ->namespace('Inventory\Purchase')
    ->group(function () {
        Route::get('/', 'ApprovalpurchaseController@index')
            ->name('approvalpo');
        
        Route::resource('approval-po', 'ApprovalpurchaseController');

        Route::get('PO/{id_po}/set-status', 'ApprovalpurchaseController@setStatus')
            ->name('po-status');
    });

// RECEIVING ------------------------------------------------------------------- Receiving
Route::prefix('inventory/receiving')
    ->namespace('Inventory\Rcv')
    ->group(function () {
        Route::get('/', 'RcvController@index')
            ->name('Receive');
        
        Route::resource('Rcv', 'RcvController');

    });





// --------------------------------------------------------------------------------------------------------KEPEGAWAIAN
// MODUL KEPEGAWAIAN
// DASHBOARD
Route::prefix('kepegawaian')
    ->namespace('Kepegawaian')
    ->group(function () {
        Route::get('/', 'DashboardpegawaiController@index')
            ->name('dashboardpegawai');
    });

// MASTER DATA KEPEGAWAIAN -------------------------------------------------------- Master Data Pegawai
Route::prefix('kepegawaian/masterdatapegawai')
    ->namespace('Kepegawaian\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatapegawaiController@index')
            ->name('masterdatapegawai');

        Route::resource('pegawai', 'MasterdatapegawaiController');
    });

Route::prefix('kepegawaian/masterdatajabatan')
    ->namespace('Kepegawaian\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatajabatanController@index')
            ->name('masterdatajabatan');

        Route::resource('jabatan', 'MasterdatajabatanController');
    });


// ABSENSI PEGAWAI ---------------------------------------------------------------- ABSENSI
Route::prefix('kepegawaian/absensi')
    ->namespace('Kepegawaian\Absensi')
    ->group(function () {
        Route::get('/', 'AbsensipegawaiController@index')
            ->name('absensipegawai');

        Route::resource('absensi', 'AbsensipegawaiController');
    });







// -------------------------------------------------------------------------------------------------------PAYROLL 
// MODUL PAYROLL
// DASHBOARD
Route::prefix('payroll')
    ->namespace('payroll')
    ->group(function () {
        Route::get('/', 'DashboardpayrollController@index')
            ->name('dashboardpayroll');
    });

// MASTER DATA ------------------------------------------------------------ Master Data Payroll
Route::prefix('payroll/masterdatagajipokok')
    ->namespace('Payroll\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatagajipokokController@index')
            ->name('masterdatagajipokok');

        Route::resource('gaji-pokok', 'MasterdatagajipokokController');
    });

Route::prefix('payroll/masterdatatunjangan')
    ->namespace('Payroll\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatatunjanganController@index')
            ->name('masterdatatunjangan');

        Route::resource('tunjangan', 'MasterdatatunjanganController');
    });





// -------------------------------------------------------------------------------------------------------ACCOUNTING
// MODUL ACCOUNTING
// DASHBOARD
Route::prefix('accounting')
    ->namespace('Accounting')
    ->group(function () {
        Route::get('/', 'DashboardaccountingController@index')
            ->name('dashboardaccounting');
    });

// MASTER DATA ---------------------------------------------------- Master Data Accounting
Route::prefix('accounting/masterdatafop')
    ->namespace('Accounting\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatafopController@index')
            ->name('masterdatafop');

        Route::resource('fop', 'MasterdatafopController');
    });

Route::prefix('accounting/masterdatabankaccount')
    ->namespace('Accounting\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatabankaccountController@index')
            ->name('masterdatabankaccount');

        Route::resource('bank-account', 'MasterdatabankaccountController');
    });

Route::prefix('accounting/masterdataakun')
    ->namespace('Accounting\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdataakunController@index')
            ->name('masterdataakun');

        Route::resource('akun', 'MasterdataakunController');
    });

Route::prefix('accounting/masterjenistransaksi')
    ->namespace('Accounting\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatajenistransaksiController@index')
            ->name('masterdatajenistransaksi');

        Route::resource('jenis-transaksi', 'MasterdatajenistransaksiController');
    });
