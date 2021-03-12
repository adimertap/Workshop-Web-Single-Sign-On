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

        Route::get('sparepart/{id_sparepart}/gallery', 'MasterdatasparepartController@gallery')
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

        Route::post('PO/{id_po}/set-status', 'PurchaseorderController@setStatus')
            ->name('po-status-kirim');
    });

Route::prefix('inventory/approvalpembelian')
    ->namespace('Inventory\Purchase')
    ->group(function () {
        Route::get('/', 'ApprovalpurchaseController@index')
            ->name('approvalpo');

        Route::resource('approval-po', 'ApprovalpurchaseController');

        Route::post('PO/{id_po}/set-status', 'ApprovalpurchaseController@setStatus')
            ->name('po-status');
    });

Route::prefix('inventory/approvalappembelian')
    ->namespace('Inventory\Purchase')
    ->group(function () {
        Route::get('/', 'ApprovalpurchaseAPController@index')
            ->name('approvalpoap');

        Route::resource('approval-po-ap', 'ApprovalpurchaseAPController');

        Route::post('PO/{id_po}/set-status', 'ApprovalpurchaseAPController@setStatus')
            ->name('po-status-ap');
    });

// RECEIVING ------------------------------------------------------------------- Receiving
Route::prefix('inventory/receiving')
    ->namespace('Inventory\Rcv')
    ->group(function () {
        Route::get('/', 'RcvController@index')
            ->name('Receive');

        Route::resource('Rcv', 'RcvController');
    });

// RETUR ---------------------------------------------------------------------- Retur
Route::prefix('inventory/retur')
    ->namespace('Inventory\Retur')
    ->group(function () {
        Route::get('/', 'ReturController@index')
            ->name('Retur');

        Route::resource('Retur', 'ReturController');
    });

// OPNAME ---------------------------------------------------------------------- Stock Opname
Route::prefix('inventory/Stockopname')
    ->namespace('Inventory\Opname')
    ->group(function () {
        Route::get('/', 'OpnameController@index')
            ->name('Opname');

        Route::resource('Opname', 'OpnameController');
    });

Route::prefix('inventory/approvalopname')
    ->namespace('Inventory\Opname')
    ->group(function () {
        Route::get('/', 'ApprovalopnameController@index')
            ->name('approvalopname');

        Route::resource('approval-opname', 'ApprovalopnameController');

        Route::post('Opname/{id_opname}/set-status', 'ApprovalopnameController@setStatus')
            ->name('approval-opname-status');
    });

// PENJUALAN ONLINE ---------------------------------------------------------------------- Penjualan Online
Route::prefix('inventory/Penjualanonline')
    ->namespace('Inventory\Penjualan')
    ->group(function () {
        Route::get('/', 'PenjualanController@index')
            ->name('Penjualan-Online');

        Route::resource('Penjualan-Online', 'PenjualanController');
    });

// KARTU GUDANG --------------------------------------------------------------------------- Kartu Gudang
Route::prefix('inventory/Kartugudang')
    ->namespace('Inventory\Kartugudang')
    ->group(function () {
        Route::get('/', 'KartugudangController@index')
            ->name('Kartu-gudang');

        Route::resource('Kartu-gudang', 'KartugudangController');
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

// GAJI PEGAWAI ----------------------------------------------------------- Gaji Pegawai
Route::prefix('payroll/Gajipegawai')
    ->namespace('Payroll\Gajipegawai')
    ->group(function () {
        Route::get('/', 'GajipegawaiController@index')
            ->name('gaji-pegawai');

        Route::resource('gaji-pegawai', 'GajipegawaiController');
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

// PAYABLE ---------------------------------------------------------------------------------------------- PAYABLE
// PRF ---------------------------------------------------------------------------- PRF
Route::prefix('accounting/Prf')
    ->namespace('Accounting\Payable')
    ->group(function () {
        Route::get('/', 'PrfController@index')
            ->name('prf');

        Route::resource('prf', 'PrfController');
    });

// Approval Prf ----------------------------------------------------------------- Approval PRF
Route::prefix('accounting/ApprovalPRF')
    ->namespace('Accounting\Payable')
    ->group(function () {
        Route::get('/', 'ApprovalprfController@index')
            ->name('approval-prf');

        Route::resource('approval-prf', 'ApprovalprfController');

        Route::post('Prf/{id_prf}/set-status', 'ApprovalprfController@setStatus')
            ->name('approval-prf-status');
    });

// PAJAK -------------------------------------------------------------------------- Pajak
Route::prefix('accounting/Pajak')
    ->namespace('Accounting\Payable')
    ->group(function () {
        Route::get('/', 'PajakController@index')
            ->name('pajak');

        Route::resource('pajak', 'PajakController');
    });