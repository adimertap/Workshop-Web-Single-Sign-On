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

Route::group(
    ['middleware' => 'auth'],
    function () {
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
        Route::prefix('frontoffice')
            ->namespace('FrontOffice')
            ->group(function () {

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

        Route::prefix('pos/pembayaranservice/invoice')
            ->namespace('PointOfSales\Pembayaran')
            ->group(function () {
                Route::get('/', 'InvoiceServiceController@index')
                    ->name('invoiceservice');

                Route::resource('invoiceservice', 'InvoiceServiceController');
            });


        // PEMBAYARAN PENJUALAN SPAREPART
        Route::prefix('pos/pembayaransparepart')
            ->namespace('PointOfSales\Pembayaran')
            ->group(function () {
                Route::get('/', 'PembayaranSparepartController@index')
                    ->name('pembayaransparepart');

                Route::resource('pembayaransparepart', 'PembayaranSparepartController');
            });

        Route::prefix('pos/pembayaransparepart/invoice')
            ->namespace('PointOfSales\Pembayaran')
            ->group(function () {
                Route::get('/', 'InvoiceSparepartController@index')
                    ->name('invoicesparepart');

                Route::resource('invoicesparepart', 'InvoiceSparepartController');
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
        Route::prefix('Inventory')
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

        Route::resource('gallery', 'MasterdatagalleryController')->except('create');
        Route::get('gallery/create/{idsparepart}', 'MasterdatagalleryController@create')->name('gallery.create');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
        Route::resource('merk-sparepart', 'MasterdatamerksparepartController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
        Route::resource('jenis-sparepart', 'MasterdataJenissparepartController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
        Route::get('/{id_supplier}/sparepart', 'MasterdatasupplierController@getDataSparepartBySupplierId');
        Route::resource('supplier', 'MasterdatasupplierController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
        Route::resource('hargasparepart', 'MasterdatahargasparepartController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
        Route::resource('rak', 'MasterdatarakController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
            Route::resource('konversi', 'MasterdatakonversiController');
        });

        Route::prefix('inventory')
        ->namespace('Inventory\Masterdata')
        ->group(function () {
            Route::resource('kemasan', 'MasterdatakemasanController');
        });


        // PURCHASE ORDER ---------------------------------------------------------------- Purchase Order
        Route::prefix('inventory')
        ->namespace('Inventory\Purchase')
        ->group(function () {

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
        Route::prefix('inventory')
            ->namespace('Inventory\Rcv')
            ->group(function () {

                Route::resource('receiving', 'RcvController', ['names' => 'Rcv']);
                Route::get('/post', 'RcvController@post')
                    ->name('Rcvstoreawal');
            });

        // RETUR ---------------------------------------------------------------------- Retur
        Route::prefix('inventory')
            ->namespace('Inventory\Retur')
            ->group(function () {

                Route::resource('retur', 'ReturController');
            });

        // OPNAME ---------------------------------------------------------------------- Stock Opname
        Route::prefix('inventory')
            ->namespace('Inventory\Opname')
            ->group(function () {

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
        Route::prefix('kepegawaian')
            ->namespace('Kepegawaian\Absensi')
            ->group(function () {

                Route::resource('absensi', 'AbsensipegawaiController');

                Route::get('Absensi/{id_absensi}', 'AbsensipegawaiController@pulang')
                    ->name('absensipulang');
            });

        // LAPORAN ABSENSI --------------------------------------------------------------- Laporan Absensi
        Route::prefix('kepegawaian/LaporanAbsensi')
            ->namespace('Kepegawaian\Absensi')
            ->group(function () {
                Route::get('/', 'LaporanabsensiController@index')
                    ->name('laporanabsensi');
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
        Route::prefix('payroll')
            ->namespace('Payroll\Gajipegawai')
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
        // InvoicePayable ----------------------------------------------------------------- Invoice Payable   
        Route::prefix('Accounting')
            ->namespace('Accounting\Payable')
            ->group(function () {
                Route::resource('invoice-payable', 'InvoicePayableController');
            });

        // PRF ---------------------------------------------------------------------------- PRF
        Route::prefix('accounting')
            ->namespace('Accounting\Payable')
            ->group(function () {
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
        Route::prefix('accounting')
            ->namespace('Accounting\Payable')
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
            ->group(function () {
                Route::get('/', 'DashboardadminController@index')
                    ->name('dashboardmarketplace');
            });

        // PENJUALAN ONLINE ---------------------------------------------------------------------- Penjualan Online
        Route::prefix('AdminMarketplace/Penjualan')
            ->namespace('AdminMarketplace\Penjualan')
            ->group(function () {
                Route::get('/', 'PenjualanController@index')
                    ->name('Penjualan-Online');

                Route::resource('Penjualan-Online', 'PenjualanController');
            });
    }
);
