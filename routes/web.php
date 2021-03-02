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


// MASTER DATA JENIS PERBAIKAN
Route::prefix('frontoffice/jenisperbaikan')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataJenisPerbaikanController@index')
            ->name('masterdatajenisperbaikan');

        Route::resource('jenisperbaikan', 'MasterDataJenisPerbaikanController');
    });

// MASTER DATA DISKON
Route::prefix('frontoffice/diskon')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataDiskonController@index')
            ->name('masterdatadiskon');

        Route::resource('diskon', 'MasterDataDiskonController');
    });


// MASTER DATA PITSTOP
Route::prefix('frontoffice/pitstop')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataPitstopController@index')
            ->name('masterdatapitstop');

        Route::resource('pitstop', 'MasterDataPitstopController');
    });


// MASTER DATA REMINDER
Route::prefix('frontoffice/reminder')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataReminderController@index')
            ->name('masterdatareminder');

        Route::resource('reminder', 'MasterDataReminderController');
    });

// MASTER DATA FAQ
Route::prefix('frontoffice/faq')
    ->namespace('FrontOffice\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterDataFAQController@index')
            ->name('masterdatafaq');

        Route::resource('faq', 'MasterDataFAQController');
    });

//  DATA PELAYANAN SERVICE
Route::prefix('frontoffice/pelayananservice')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'PelayananServiceController@index')
            ->name('pelayananservice');

        Route::resource('pelayananservice', 'PelayananServiceController');
    });

//  DATA CUSTOMER BENGKEL
Route::prefix('frontoffice/customerterdaftar')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'CustomerBengkelController@index')
            ->name('customerterdaftar');

        Route::resource('customerterdaftar', 'CustomerBengkelController');
    });

//  DATA PENJUALAN SPAREPART
Route::prefix('frontoffice/penjualansparepart')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'PenjualanSparepartController@index')
            ->name('penjualansparepart');

        Route::resource('penjualansparepart', 'PenjualanSparepartController');
    });

//  DATA CUSTOMER CARE
Route::prefix('frontoffice/customercare')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'CustomerCareController@index')
            ->name('customercare');

        Route::resource('customercare', 'CustomerCareController');
    });

//  DATA PELAYANAN SERVICE
Route::prefix('frontoffice/pelayananservice')
    ->namespace('FrontOffice')
    ->group(function () {
        Route::get('/', 'PelayananServiceController@index')
            ->name('pelayananservice');

        Route::resource('pelayananservice', 'PelayananServiceController');
    });

// ------------------------------------------------------------------------
// MODUL SERVICE
// DASHBOARD
Route::prefix('service')
    ->namespace('Service')
    ->group(function () {
        Route::get('/', 'DashboardServiceController@index')
            ->name('dashboardservice');
    });

// PENERIMAANSERVICE
Route::prefix('service/penerimaanservice')
    ->namespace('Service')
    ->group(function () {
        Route::get('/', 'PenerimaanServiceController@index')
            ->name('penerimaanservice');

        Route::resource('penerimaanservice', 'PenerimaanServiceController');
    });

// PENERIMAANSERVICE
Route::prefix('service/jadwalmekanik')
    ->namespace('Service')
    ->group(function () {
        Route::get('/', 'JadwalMekanikController@index')
            ->name('jadwalmekanik');

        Route::resource('jadwalmekanik', 'JadwalMekanikController');
    });

// STOK SPAREPART
Route::prefix('service/stoksparepart')
    ->namespace('Service')
    ->group(function () {
        Route::get('/', 'StokSparepartController@index')
            ->name('stoksparepart');

        Route::resource('stoksparepart', 'StokSparepartController');
    });

// PENGERJAAN SERVICE
Route::prefix('service/pengerjaanservice')
    ->namespace('Service')
    ->group(function () {
        Route::get('/', 'PengerjaanServiceController@index')
            ->name('pengerjaanservice');

        Route::resource('pengerjaanservice', 'PengerjaanServiceController');
    });


// ------------------------------------------------------------------------
// MODUL POS
// DASHBOARD
Route::prefix('pos')
    ->namespace('PointOfSales')
    ->group(function () {
        Route::get('/', 'DashboardPOSController@index')
            ->name('dashboardpointofsales');
    });

// PEMBAYARAN LAYANAN SERVICE
Route::prefix('pos/pembayaranservice')
    ->namespace('PointOfSales\Pembayaran')
    ->group(function () {
        Route::get('/', 'PembayaranServiceController@index')
            ->name('pembayaranservice');

        Route::resource('pembayaranservice', 'PembayaranServiceController');
    });

// PEMBAYARAN PENJUALAN SPAREPART
Route::prefix('pos/pembayaransparepart')
    ->namespace('PointOfSales\Pembayaran')
    ->group(function () {
        Route::get('/', 'PembayaranSparepartController@index')
            ->name('pembayaransparepart');

        Route::resource('pembayaransparepart', 'PembayaranSparepartController');
    });

// PEMBAYARAN PENJUALAN SPAREPART
Route::prefix('pos/laporanservice')
    ->namespace('PointOfSales\Laporan')
    ->group(function () {
        Route::get('/', 'LaporanServiceController@index')
            ->name('laporanservice');

        Route::resource('laporanservice', 'LaporanServiceController');
    });

// PEMBAYARAN PENJUALAN SPAREPART
Route::prefix('pos/laporansparepart')
    ->namespace('PointOfSales\Laporan')
    ->group(function () {
        Route::get('/', 'LaporanSparepartController@index')
            ->name('laporansparepart');

        Route::resource('laporansparepart', 'LaporanSparepartController');
    });

// PEMBAYARAN PENJUALAN SPAREPART
Route::prefix('pos/pembayaransparepart')
    ->namespace('PointOfSales\Pembayaran')
    ->group(function () {
        Route::get('/', 'PembayaranSparepartController@index')
            ->name('pembayaransparepart');

        Route::resource('pembayaran', 'PembayaranSparepartController');
    });

// ------------------------------------------------------------------------
// MODUL SSO
// DASHBOARD
Route::prefix('sso')
    ->namespace('SingleSignOn')
    ->group(function () {
        Route::get('/', 'DashboardSSOController@index')
            ->name('dashboardsso');
    });

// MANAJEMEN ROLE
Route::prefix('sso/role')
    ->namespace('SingleSignOn\Manajemen')
    ->group(function () {
        Route::get('/', 'ManajemenRoleController@index')
            ->name('manajemenrole');

        Route::resource('role', 'ManajemenRoleController');
    });

// MANAJEMEN HAK Akses
Route::prefix('sso/hakakses')
    ->namespace('SingleSignOn\Manajemen')
    ->group(function () {
        Route::get('/', 'ManajemenHakAksesController@index')
            ->name('manajemenhakakses');

        Route::resource('hakakses', 'ManajemenHakAksesController');
    });

// MANAJEMEN ROLE
Route::prefix('sso/user')
    ->namespace('SingleSignOn\Manajemen')
    ->group(function () {
        Route::get('/', 'ManajemenUserController@index')
            ->name('manajemenuser');

        Route::resource('user', 'ManajemenUserController');
    });


// ------------------------------------------------------------------------------------------------------------------
// MODUL INVENTORY
// DASHBOARD
Route::prefix('inventory')
    ->namespace('Inventory')
    ->group(function () {
        Route::get('/', 'DashboardinventoryController@index')
            ->name('dashboardinventory');
    });

// MASTERDATA INVENTORY -------------------------------------------------------------------------------------------------
Route::prefix('inventory/sparepart')
    ->namespace('Inventory\Masterdata')
    ->group(function () {
        Route::get('/', 'MasterdatasparepartController@index')
            ->name('masterdatasparepart');

        Route::resource('sparepart', 'MasterdatasparepartController');
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



// ------------------------------------------------------------------------------------------------------------------------- 
// MODUL KEPEGAWAIAN
// DASHBOARD
Route::prefix('kepegawaian')
    ->namespace('Kepegawaian')
    ->group(function () {
        Route::get('/', 'DashboardpegawaiController@index')
            ->name('dashboardpegawai');
    });

// MASTER DATA KEPEGAWAIAN ------------------------------------------------------------------------------------------------
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


// ------------------------------------------------------------------------------------------------------------------------- 
// MODUL PAYROLL
// DASHBOARD
Route::prefix('payroll')
    ->namespace('payroll')
    ->group(function () {
        Route::get('/', 'DashboardpayrollController@index')
            ->name('dashboardpayroll');
    });

// MASTER DATA
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





// ------------------------------------------------------------------------------------------------------------------------- 
// MODUL ACCOUNTING
// DASHBOARD
Route::prefix('accounting')
    ->namespace('Accounting')
    ->group(function () {
        Route::get('/', 'DashboardaccountingController@index')
            ->name('dashboardaccounting');
    });

// MASTER DATA
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
