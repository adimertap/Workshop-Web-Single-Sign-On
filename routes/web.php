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


Auth::routes(['verify' => true]);


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get("/getkabupaten/{id}", "Auth\RegisterController@kabupaten_baru");
Route::get("/getkecamatan/{id}", "Auth\RegisterController@kecamatan_baru");
Route::get("/getdesa/{id}", "Auth\RegisterController@desa_baru");


Route::get('account/password', 'Account\PasswordController@edit')->name('password.edit');
Route::patch('account/password', 'Account\PasswordController@update')->name('password.edit');

Route::group(
    ['middleware' => 'auth'],
    function () {
        // MODUL FRONT OFFICE
        // DASHBOARD
        Route::prefix('frontoffice')
            ->namespace('FrontOffice')
            ->middleware(['admin_front_office', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardFrontOfficeController@index')
                    ->name('dashboardfrontoffice');
            });

        // MASTER DATA JENIS KENDARAAN
        Route::prefix('frontoffice')
            ->namespace('FrontOffice\Masterdata')
            ->middleware(['admin_front_office', 'verified'])
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
            ->middleware(['admin_front_office', 'verified'])
            ->group(function () {
                Route::resource('pelayananservice', 'PelayananServiceController');
                Route::resource('customerterdaftar', 'CustomerBengkelController');
                Route::resource('penjualansparepart', 'PenjualanSparepartController');
                Route::put('/pengerjaan/{id}', 'PelayananServiceController@status')
                    ->name('dikerjakan');
            });

        // ------------------------------------------------------------------------
        // MODUL SERVICE
        // DASHBOARD
        Route::prefix('service')
            ->namespace('Service')
            ->middleware(['admin_service_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardServiceController@index')
                    ->name('dashboardservice');
            });

        // PENERIMAANSERVICE
        Route::prefix('service')
            ->namespace('Service')
            ->middleware(['admin_service_instructor', 'verified'])
            ->group(function () {
                Route::resource('jadwalmekanik', 'JadwalMekanikController');
                Route::resource('stoksparepart', 'StokSparepartController');
                Route::resource('pengerjaanservice', 'PengerjaanServiceController');
            });

        Route::prefix('service')
            ->namespace('Service')
            ->middleware(['admin_service_advisor', 'verified'])
            ->group(function () {
                Route::resource('penerimaanservice', 'PenerimaanServiceController');
            });


        // ------------------------------------------------------------------------
        // MODUL POS
        // DASHBOARD
        Route::prefix('pos')
            ->namespace('PointOfSales')
            ->middleware(['admin_kasir', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardPOSController@index')
                    ->name('dashboardpointofsales');
            });

        // PEMBAYARAN LAYANAN SERVICE
        Route::prefix('pos')
            ->namespace('PointOfSales\Pembayaran')
            ->middleware(['admin_kasir', 'verified'])
            ->group(function () {
                Route::resource('pembayaranservice', 'PembayaranServiceController');
                Route::resource('pembayaransparepart', 'PembayaranSparepartController');
            });


        // PEMBAYARAN PENJUALAN SPAREPART
        Route::prefix('pos')
            ->namespace('PointOfSales\Laporan')
            ->middleware(['admin_kasir', 'verified'])
            ->group(function () {
                Route::resource('laporanservice', 'LaporanServiceController');
                Route::resource('laporansparepart', 'LaporanSparepartController');
            });

        // ------------------------------------------------------------------------
        // MODUL SSO
        // DASHBOARD
        Route::prefix('sso')
            ->namespace('SingleSignOn')
            ->middleware(['verified'])
            ->group(function () {
                Route::get('/', 'DashboardSSOController@index')
                    ->name('dashboardsso');
                Route::resource('profile', 'ProfileController');
            });

        // MANAJEMEN ROLE
        Route::prefix('sso')
            ->namespace('SingleSignOn\Manajemen')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::resource('manajemen-user', 'ManajemenUserController');
            });

        // MODUL INVENTORY ------------------------------------------------------------------------------------ INVENTORY
        // DASHBOARD
        Route::prefix('inventory')
            ->namespace('Inventory')
            ->middleware(['admin_inventory_gabung', 'verified'])

            ->group(function () {
                Route::get('/', 'DashboardinventoryController@index')
                    ->name('dashboardinventory');
            });

        // MASTERDATA INVENTORY -------------------------------------------------------- Master Data Inventory
        Route::prefix('Inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatasparepartController@index')
                    ->name('masterdatasparepart');
                Route::get('sparepart/{id_sparepart}/gallery', 'MasterdatasparepartController@gallery')
                    ->name('sparepart.gallery');
                Route::resource('sparepart', 'MasterdatasparepartController');
                Route::get('sparepart/getmerk/{id}', 'MasterdatasparepartController@getmerk');
            });

        Route::prefix('inventory/gallerysparepart')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatagalleryController@index')
                    ->name('masterdatagallery');

                Route::resource('gallery', 'MasterdatagalleryController')->except('create');
                Route::get('gallery/create/{idsparepart}', 'MasterdatagalleryController@create')->name('gallery.create');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('merk-sparepart', 'MasterdatamerksparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('jenis-sparepart', 'MasterdataJenissparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::get('/{id_supplier}/sparepart', 'MasterdatasupplierController@getDataSparepartBySupplierId');
                Route::resource('supplier', 'MasterdatasupplierController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('hargasparepart', 'MasterdatahargasparepartController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('rak', 'MasterdatarakController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('konversi', 'MasterdatakonversiController');
            });

        Route::prefix('inventory')
            ->namespace('Inventory\Masterdata')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {
                Route::resource('kemasan', 'MasterdatakemasanController');
            });


        // PURCHASE ORDER ---------------------------------------------------------------- Purchase Order
        Route::prefix('inventory')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing', 'verified'])
            ->group(function () {

                Route::resource('purchase-order', 'PurchaseorderController');
                Route::post('PO/{id_po}/set-status', 'PurchaseorderController@setStatus')
                    ->name('po-status-kirim');
            });

        Route::prefix('inventory/approvalpembelian')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing', 'verified'])
            ->group(function () {
                Route::get('/', 'ApprovalpurchaseController@index')
                    ->name('approvalpo');

                Route::resource('approval-po', 'ApprovalpurchaseController');

                Route::post('PO/{id_po}/set-status', 'ApprovalpurchaseController@setStatus')
                    ->name('po-status');
            });

        Route::prefix('inventory/approvalappembelian')
            ->namespace('Inventory\Purchase')
            ->middleware(['admin_purchasing', 'verified'])
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
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {

                Route::resource('receiving', 'RcvController', ['names' => 'Rcv']);
                Route::get('detail/{id_po}', 'RcvController@detailpo')
                    ->name('Rcv-detail-po');
            });

        // RETUR ---------------------------------------------------------------------- Retur
        Route::prefix('inventory')
            ->namespace('Inventory\Retur')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {

                Route::resource('retur', 'ReturController');
            });

        // OPNAME ---------------------------------------------------------------------- Stock Opname
        Route::prefix('inventory')
            ->namespace('Inventory\Opname')
            ->middleware(['admin_gudang', 'verified'])
            ->group(function () {

                Route::resource('Opname', 'OpnameController');
            });

        Route::prefix('inventory/approvalopname')
            ->namespace('Inventory\Opname')
            ->middleware(['owner', 'verified'])
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
            ->middleware(['admin_gudang', 'verified'])
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
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardpegawaiController@index')
                    ->name('dashboardpegawai');
            });

        // MASTER DATA KEPEGAWAIAN -------------------------------------------------------- Master Data Pegawai
        Route::prefix('kepegawaian/masterdatapegawai')
            ->namespace('Kepegawaian\Masterdata')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatapegawaiController@index')
                    ->name('masterdatapegawai');

                Route::resource('pegawai', 'MasterdatapegawaiController');
            });

        Route::prefix('kepegawaian/masterdatajabatan')
            ->namespace('Kepegawaian\Masterdata')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatajabatanController@index')
                    ->name('masterdatajabatan');

                Route::resource('jabatan', 'MasterdatajabatanController');
            });


        // ABSENSI PEGAWAI ---------------------------------------------------------------- ABSENSI
        Route::prefix('kepegawaian')
            ->namespace('Kepegawaian\Absensi')
            ->middleware(['owner', 'verified'])
            ->group(function () {

                Route::resource('absensi', 'AbsensipegawaiController');

                Route::get('Absensi/{id_absensi}', 'AbsensipegawaiController@pulang')
                    ->name('absensipulang');
            });

        // LAPORAN ABSENSI --------------------------------------------------------------- Laporan Absensi
        Route::prefix('kepegawaian/LaporanAbsensi')
            ->namespace('Kepegawaian\Absensi')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'LaporanabsensiController@index')
                    ->name('laporanabsensi');
            });

        // JADWAL PEGAWAI --------------------------------------------------------------- Jadwal
        Route::prefix('kepegawaian')
            ->namespace('Kepegawaian\Jadwal')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::resource('jadwal-pegawai', 'JadwalpegawaiController');
                Route::post('jadwal-pegawai/tanggal', 'JadwalpegawaiController@getJadwal');
                Route::post('jadwal-pegawai/masuk', 'JadwalpegawaiController@masuk');
                Route::post('jadwal-pegawai/libur', 'JadwalpegawaiController@libur');
            });


        // -------------------------------------------------------------------------------------------------------PAYROLL 
        // MODUL PAYROLL
        // DASHBOARD
        Route::prefix('payroll')
            ->namespace('payroll')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardpayrollController@index')
                    ->name('dashboardpayroll');
            });

        // MASTER DATA ------------------------------------------------------------ Master Data Payroll
        Route::prefix('payroll/masterdatagajipokok')
            ->namespace('Payroll\Masterdata')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatagajipokokController@index')
                    ->name('masterdatagajipokok');

                Route::resource('gaji-pokok', 'MasterdatagajipokokController');
            });

        Route::prefix('payroll/masterdatatunjangan')
            ->namespace('Payroll\Masterdata')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatatunjanganController@index')
                    ->name('masterdatatunjangan');

                Route::resource('tunjangan', 'MasterdatatunjanganController');
            });

        // GAJI PEGAWAI ----------------------------------------------------------- Gaji Pegawai
        Route::prefix('payroll')
            ->namespace('Payroll\Gajipegawai')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::resource('gaji-pegawai', 'GajipegawaiController');

                Route::post('gaji-pegawai/{id_gaji_pegawai}/set-status', 'GajipegawaiController@setStatus')
                    ->name('gaji-pegawai-status');
                Route::post('gaji-pegawai/{bulan_gaji}/{tahun_gaji}/set-status', 'GajipegawaiController@setStatusPerBulanTahun')
                    ->name('gaji-pegawai-status-bulan-tahun');
            });


        // -------------------------------------------------------------------------------------------------------ACCOUNTING
        // MODUL ACCOUNTING
        // DASHBOARD
        Route::prefix('accounting')
            ->namespace('Accounting')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardaccountingController@index')
                    ->name('dashboardaccounting');
            });

        // MASTER DATA ---------------------------------------------------- Master Data Accounting
        Route::prefix('accounting/masterdatafop')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatafopController@index')
                    ->name('masterdatafop');

                Route::resource('fop', 'MasterdatafopController');
            });

        Route::prefix('accounting/masterdatabankaccount')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatabankaccountController@index')
                    ->name('masterdatabankaccount');

                Route::resource('bank-account', 'MasterdatabankaccountController');
            });

        Route::prefix('accounting/masterdataakun')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdataakunController@index')
                    ->name('masterdataakun');

                Route::resource('akun', 'MasterdataakunController');
            });

        Route::prefix('accounting/masterjenistransaksi')
            ->namespace('Accounting\Masterdata')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::get('/', 'MasterdatajenistransaksiController@index')
                    ->name('masterdatajenistransaksi');

                Route::resource('jenis-transaksi', 'MasterdatajenistransaksiController');
            });
        
        Route::prefix('accounting')
        ->namespace('Accounting\Masterdata')
        ->middleware(['admin_accounting_gabung', 'verified'])
        ->group(function () {
            Route::resource('penentuan-akun', 'PenentuanAkunController');
        });

        // PAYABLE ---------------------------------------------------------------------------------------------- PAYABLE
        // InvoicePayable ----------------------------------------------------------------- Invoice Payable   
        Route::prefix('Accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::resource('invoice-payable', 'InvoicePayableController');
            });

        // PRF ---------------------------------------------------------------------------- PRF
        Route::prefix('accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::resource('prf', 'PrfController');

                Route::post('Prf/{id_prf}', 'PrfController@statusBayar')
                    ->name('prf-bayar');
            });

        // Approval Prf ----------------------------------------------------------------- Approval PRF
        Route::prefix('accounting/ApprovalPRF')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_accounting_gabung', 'verified'])
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
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {

                Route::resource('pajak', 'PajakController');
            });

        // Gaji Pegawai Accounting ----------------------------------------------------------------- Gaji Pegawai Accounting  
        Route::prefix('Accounting')
            ->namespace('Accounting\Payable')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::resource('gaji-accounting', 'GajiAccountingController');

                Route::post('gaji-accounting/posting-jurnal', 'GajiAccountingController@postingjurnal')
                    ->name('gaji-pegawai-jurnal');
            });

        Route::prefix('Accounting')
        ->namespace('Accounting\Receiveable')
        ->middleware(['admin_accounting_gabung', 'verified'])
        ->group(function () {
            Route::resource('pemasukan-kasir', 'PemasukanController');
            Route::get('pemasukan-online/{tanggal_transaksi}', 'PemasukanController@Pemasukanonline')
                    ->name('pemasukan-online');
            Route::get('pemasukan-service/{tanggal_laporan}', 'PemasukanController@Laporanservice')
                    ->name('pemasukan-service');
            });


        // Jurnal Pengeluaran ----------------------------------------------------------------- Jurnal Pengeluaran 
        Route::prefix('Accounting')
            ->namespace('Accounting\Jurnal')
            ->middleware(['admin_accounting_gabung', 'verified'])
            ->group(function () {
                Route::resource('jurnal-pengeluaran', 'JurnalPengeluaranController');

                Route::post('Pajak/{id_pajak}', 'JurnalPengeluaranController@Pajak')
                    ->name('jurnal-pengeluaran-pajak');
                Route::post('PRF/{id_prf}', 'JurnalPengeluaranController@Prf')
                    ->name('jurnal-pengeluaran-prf');
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
            ->middleware(['admin_marketplace', 'verified'])
            ->group(function () {
                Route::get('/', 'DashboardadminController@index')
                    ->name('dashboardmarketplace');
                Route::get('/faq', 'DashboardadminController@faq')
                    ->name('faq');
                Route::put('/faqupdate/{id}', 'DashboardadminController@update')
                    ->name('faq-update');
                Route::delete('/faqdestroy/{id}', 'DashboardadminController@destroy')
                    ->name('faq-destroy');
                Route::get('/transaksi', 'TransaksiController@index')
                    ->name('transaksi-marketplace');
                Route::put('/transaksiupdate/{id}', 'TransaksiController@update')
                    ->name('transaksi-marketplace-update');
            });

        // PENJUALAN ONLINE ---------------------------------------------------------------------- Penjualan Online
        Route::prefix('AdminMarketplace/Penjualan')
            ->namespace('AdminMarketplace\Penjualan')
            ->middleware(['admin_marketplace', 'verified'])
            ->group(function () {
                Route::get('/', 'PenjualanController@index')
                    ->name('Penjualan-Online');
            });
    }
);
