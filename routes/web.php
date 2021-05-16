<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::group(
    ['middleware' => 'auth'],
    function () {
        // MODUL FRONT OFFICE
        // DASHBOARD
        Route::prefix('frontoffice')
            ->namespace('FrontOffice')
            ->middleware(['admin_front_office'])
            ->group(function () {
                Route::get('/', 'DashboardFrontOfficeController@index')
                    ->name('dashboardfrontoffice');
            });

        // MASTER DATA JENIS KENDARAAN
        Route::prefix('frontoffice')
            ->namespace('FrontOffice\Masterdata')
            ->middleware(['admin_front_office'])
            ->group(function () {
                Route::resource('jenis-kendaraan', 'MasterDataJenisKendaraanController');
                Route::resource('jenis-perbaikan', 'MasterDataJenisPerbaikanController');
                Route::resource('diskon', 'MasterDataDiskonController');
                Route::resource('pitstop', 'MasterDataPitstopController');
                Route::resource('reminder', 'MasterDataReminderController');
                Route::resource('faq', 'MasterDataFAQController');
                Route::resource('merk-kendaraan', 'MasterDataMerkKendaraanController');
                Route::resource('kendaraan', 'MasterDataKendaraanController');
            });


        //  DATA PELAYANAN SERVICE
        Route::prefix('frontoffice')
            ->namespace('FrontOffice')
            ->middleware(['admin_front_office'])
            ->group(function () {
                Route::resource('pelayananservice', 'PelayananServiceController');
                Route::resource('customerterdaftar', 'CustomerBengkelController');
                Route::resource('penjualansparepart', 'PenjualanSparepartController');
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
        Route::prefix('service')
            ->namespace('Service')
            ->group(function () {
                Route::resource('jadwalmekanik', 'JadwalMekanikController');
                Route::resource('stoksparepart', 'StokSparepartController');
                Route::resource('pengerjaanservice', 'PengerjaanServiceController');
            });

        Route::prefix('service')
            ->namespace('Service')
            ->middleware(['admin_service_advisor'])
            ->group(function () {
                Route::resource('penerimaanservice', 'PenerimaanServiceController');
            });


        // ------------------------------------------------------------------------
        // MODUL POS
        // DASHBOARD
        Route::prefix('pos')
            ->namespace('PointOfSales')
            ->middleware(['admin_kasir'])
            ->group(function () {
                Route::get('/', 'DashboardPOSController@index')
                    ->name('dashboardpointofsales');
            });

        // PEMBAYARAN LAYANAN SERVICE
        Route::prefix('pos')
            ->namespace('PointOfSales\Pembayaran')
            ->middleware(['admin_kasir'])
            ->group(function () {
                Route::resource('pembayaranservice', 'PembayaranServiceController');
                Route::resource('invoiceservice', 'InvoiceServiceController');
                Route::resource('pembayaransparepart', 'PembayaranSparepartController');
                Route::resource('invoicesparepart', 'InvoiceSparepartController');
            });


        // PEMBAYARAN PENJUALAN SPAREPART
        Route::prefix('pos')
            ->namespace('PointOfSales\Laporan')
            ->middleware(['admin_kasir'])
            ->group(function () {
                Route::resource('laporanservice', 'LaporanServiceController');
                Route::resource('laporansparepart', 'LaporanSparepartController');
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
        Route::prefix('sso')
            ->namespace('SingleSignOn\Manajemen')
            ->middleware(['owner'])
            ->group(function () {
                Route::resource('manajemen-user', 'ManajemenUserController');
            });

        // MODUL INVENTORY ------------------------------------------------------------------------------------ INVENTORY
        // DASHBOARD
        Route::prefix('inventory')
            ->namespace('Inventory')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::get('/', 'DashboardinventoryController@index')
                    ->name('dashboardinventory');
            });

        // MASTERDATA INVENTORY -------------------------------------------------------- Master Data Inventory
        Route::prefix('Inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::get('/', 'MasterdatasparepartController@index')
                    ->name('masterdatasparepart');

                Route::get('sparepart/{id_sparepart}/gallery', 'MasterdatasparepartController@gallery')
                    ->name('sparepart.gallery');

                Route::resource('sparepart', 'MasterdatasparepartController');
            });

        Route::prefix('inventory/gallerysparepart')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::get('/', 'MasterdatagalleryController@index')
                    ->name('masterdatagallery');

                Route::resource('gallery', 'MasterdatagalleryController')->except('create');
                Route::get('gallery/create/{idsparepart}', 'MasterdatagalleryController@create')->name('gallery.create');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('merk-sparepart', 'MasterdatamerksparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('jenis-sparepart', 'MasterdataJenissparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::get('/{id_supplier}/sparepart', 'MasterdatasupplierController@getDataSparepartBySupplierId');
                Route::resource('supplier', 'MasterdatasupplierController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('hargasparepart', 'MasterdatahargasparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('rak', 'MasterdatarakController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('konversi', 'MasterdatakonversiController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang'])
            ->group(function () {
                Route::resource('kemasan', 'MasterdatakemasanController');
            });


        // PURCHASE ORDER ---------------------------------------------------------------- Purchase Order
        Route::prefix('inventory')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing'])
            ->group(function () {

                Route::resource('purchase-order', 'PurchaseorderController');

                Route::post('PO/{id_po}/set-status', 'PurchaseorderController@setStatus')
                    ->name('po-status-kirim');
            });

        Route::prefix('inventory/approvalpembelian')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing'])
            ->group(function () {
                Route::get('/', 'ApprovalpurchaseController@index')
                    ->name('approvalpo');

                Route::resource('approval-po', 'ApprovalpurchaseController');

                Route::post('PO/{id_po}/set-status', 'ApprovalpurchaseController@setStatus')
                    ->name('po-status');
            });

        Route::prefix('inventory/approvalappembelian')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing'])
            ->group(function () {
                Route::get('/', 'ApprovalpurchaseAPController@index')
                    ->name('approvalpoap');

                Route::resource('approval-po-ap', 'ApprovalpurchaseAPController');

                Route::post('PO/{id_po}/set-status', 'ApprovalpurchaseAPController@setStatus')
                    ->name('po-status-ap');
            });

        // RECEIVING ------------------------------------------------------------------- Receiving
        Route::prefix('inventory')
            ->namespace('Inventory\Rcv')
            ->middleware(['admin_purchasing'])
            ->group(function () {

                Route::resource('receiving', 'RcvController', ['names' => 'Rcv']);
                Route::get('/post', 'RcvController@post')
                    ->name('Rcvstoreawal');
            });

        // RETUR ---------------------------------------------------------------------- Retur
        Route::prefix('inventory')
            ->namespace('Inventory\Retur')
            ->middleware(['admin_purchasing'])
            ->group(function () {

                Route::resource('retur', 'ReturController');
            });

        // OPNAME ---------------------------------------------------------------------- Stock Opname
        Route::prefix('inventory')
            ->namespace('Inventory\Opname')
            ->middleware(['admin_purchasing'])
            ->group(function () {

                Route::resource('Opname', 'OpnameController');
            });

        Route::prefix('inventory/approvalopname')
            ->namespace('Inventory\Opname')
            ->middleware(['admin_purchasing'])
            ->group(function () {
                Route::get('/', 'ApprovalopnameController@index')
                    ->name('approvalopname');

                Route::resource('approval-opname', 'ApprovalopnameController');

                Route::post('Opname/{id_opname}/set-status', 'ApprovalopnameController@setStatus')
                    ->name('approval-opname-status');
            });


        // KARTU GUDANG --------------------------------------------------------------------------- Kartu Gudang
        Route::prefix('inventory/Kartugudang')
            ->namespace('Inventory\Kartugudang')
            ->middleware(['admin_purchasing'])
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
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'DashboardpegawaiController@index')
                    ->name('dashboardpegawai');
            });

        // MASTER DATA KEPEGAWAIAN -------------------------------------------------------- Master Data Pegawai
        Route::prefix('kepegawaian/masterdatapegawai')
            ->namespace('Kepegawaian\Masterdata')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'MasterdatapegawaiController@index')
                    ->name('masterdatapegawai');

                Route::resource('pegawai', 'MasterdatapegawaiController');
            });

        Route::prefix('kepegawaian/masterdatajabatan')
            ->namespace('Kepegawaian\Masterdata')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'MasterdatajabatanController@index')
                    ->name('masterdatajabatan');

                Route::resource('jabatan', 'MasterdatajabatanController');
            });


        // ABSENSI PEGAWAI ---------------------------------------------------------------- ABSENSI
        Route::prefix('kepegawaian')
            ->namespace('Kepegawaian\Absensi')
            ->middleware(['owner'])
            ->group(function () {

                Route::resource('absensi', 'AbsensipegawaiController');

                Route::get('Absensi/{id_absensi}', 'AbsensipegawaiController@pulang')
                    ->name('absensipulang');
            });

        // LAPORAN ABSENSI --------------------------------------------------------------- Laporan Absensi
        Route::prefix('kepegawaian/LaporanAbsensi')
            ->namespace('Kepegawaian\Absensi')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'LaporanabsensiController@index')
                    ->name('laporanabsensi');
            });

        // -------------------------------------------------------------------------------------------------------PAYROLL 
        // MODUL PAYROLL
        // DASHBOARD
        Route::prefix('payroll')
            ->namespace('payroll')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'DashboardpayrollController@index')
                    ->name('dashboardpayroll');
            });

        // MASTER DATA ------------------------------------------------------------ Master Data Payroll
        Route::prefix('payroll/masterdatagajipokok')
            ->namespace('Payroll\Masterdata')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'MasterdatagajipokokController@index')
                    ->name('masterdatagajipokok');

                Route::resource('gaji-pokok', 'MasterdatagajipokokController');
            });

        Route::prefix('payroll/masterdatatunjangan')
            ->namespace('Payroll\Masterdata')
            ->middleware(['owner'])
            ->group(function () {
                Route::get('/', 'MasterdatatunjanganController@index')
                    ->name('masterdatatunjangan');

                Route::resource('tunjangan', 'MasterdatatunjanganController');
            });

        // GAJI PEGAWAI ----------------------------------------------------------- Gaji Pegawai
        Route::prefix('payroll')
            ->namespace('Payroll\Gajipegawai')
            ->middleware(['owner'])
            ->group(function () {
                Route::resource('gaji-pegawai', 'GajipegawaiController');

                Route::post('gaji-pegawai/{id_gaji_pegawai}/set-status', 'GajipegawaiController@setStatus')
                    ->name('gaji-pegawai-status');
            });


        // -------------------------------------------------------------------------------------------------------ACCOUNTING
        // MODUL ACCOUNTING
        // DASHBOARD
        Route::prefix('accounting')
            ->namespace('Accounting')
            ->middleware(['admin_account_receivable'])
            ->group(function () {
                Route::get('/', 'DashboardaccountingController@index')
                    ->name('dashboardaccounting');
            });

        // MASTER DATA ---------------------------------------------------- Master Data Accounting
        Route::prefix('accounting/masterdatafop')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_account_receivable'])
            ->group(function () {
                Route::get('/', 'MasterdatafopController@index')
                    ->name('masterdatafop');

                Route::resource('fop', 'MasterdatafopController');
            });

        Route::prefix('accounting/masterdatabankaccount')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_account_receivable'])
            ->group(function () {
                Route::get('/', 'MasterdatabankaccountController@index')
                    ->name('masterdatabankaccount');

                Route::resource('bank-account', 'MasterdatabankaccountController');
            });

        Route::prefix('accounting/masterdataakun')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_account_receivable'])
            ->group(function () {
                Route::get('/', 'MasterdataakunController@index')
                    ->name('masterdataakun');

                Route::resource('akun', 'MasterdataakunController');
            });

        Route::prefix('accounting/masterjenistransaksi')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_account_receivable'])
            ->group(function () {
                Route::get('/', 'MasterdatajenistransaksiController@index')
                    ->name('masterdatajenistransaksi');

                Route::resource('jenis-transaksi', 'MasterdatajenistransaksiController');
            });

        // PAYABLE ---------------------------------------------------------------------------------------------- PAYABLE
        // InvoicePayable ----------------------------------------------------------------- Invoice Payable   
        Route::prefix('Accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_account_payable'])
            ->group(function () {
                Route::resource('invoice-payable', 'InvoicePayableController');
            });

        // PRF ---------------------------------------------------------------------------- PRF
        Route::prefix('accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_account_payable'])
            ->group(function () {
                Route::resource('prf', 'PrfController');
            });

        // Approval Prf ----------------------------------------------------------------- Approval PRF
        Route::prefix('accounting/ApprovalPRF')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_account_payable'])
            ->group(function () {
                Route::get('/', 'ApprovalprfController@index')
                    ->name('approval-prf');

                Route::resource('approval-prf', 'ApprovalprfController');

                Route::post('Prf/{id_prf}/set-status', 'ApprovalprfController@setStatus')
                    ->name('approval-prf-status');
            });

        // PAJAK -------------------------------------------------------------------------- Pajak
        Route::prefix('accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_account_receivable'])
            ->group(function () {

                Route::resource('pajak', 'PajakController');
            });

        // CATATAN ADIM -------------------------------------------------------------------- Catatan Adim
        // NOTES ADIM
        Route::prefix('Note/Noteadim')
            ->namespace('Note\Noteadim')
            ->group(function () {
                Route::get('/', 'NoteadimController@index')
                    ->name('Note');

                Route::resource('Note-adim', 'NoteadimController');

                Route::post('Note/{id_catatan}/set-status', 'NoteadimController@setStatus')
                    ->name('status-catatan');
            });


        // MODUL ADMIN MARKETPLACE ------------------------------------------------------------ ADM. Marketplace
        Route::prefix('AdminMarketplace')
            ->namespace('AdminMarketplace')
            ->middleware(['admin_marketplace'])
            ->group(function () {
                Route::get('/', 'DashboardadminController@index')
                    ->name('dashboardmarketplace');
            });

        // PENJUALAN ONLINE ---------------------------------------------------------------------- Penjualan Online
        Route::prefix('AdminMarketplace/Penjualan')
            ->namespace('AdminMarketplace\Penjualan')
            ->middleware(['admin_marketplace'])
            ->group(function () {
                Route::get('/', 'PenjualanController@index')
                    ->name('Penjualan-Online');

                Route::resource('Penjualan-Online', 'PenjualanController');
            });
    }
);
