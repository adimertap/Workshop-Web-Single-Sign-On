<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request as RequestSession;

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

// Route::group(['domain' => '{subdomain}.bengkel.test'], function ($subdomain) {
//     return $subdomain;
// });

Route::domain('{domain}.bengkel.test')->group(function () {
    Route::get('/', function () {
        dd('pos');
    });
});

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
                Route::get('/midtrans', 'PaymentBengkelController@payment')->name('payment');
            });

        // MANAJEMEN ROLE
        Route::prefix('sso')
            ->namespace('SingleSignOn\Manajemen')
            ->middleware(['owner', 'verified'])
            ->group(function () {
                Route::resource('manajemen-user', 'ManajemenUserController');
                Route::resource('manajemen-akses', 'ManajemenHakAksesController');
                Route::resource('manajemen-cabang', 'ManajemenCabangController');
            });
    }
);

// Midtrans
Route::post('/midtrans/callback', 'MidtransController@notificationHandler');
Route::get('/midtrans/finish', 'MidtransController@finishRedirect');
Route::get('/midtrans/unfinish', 'MidtransController@unfinishRedirect');
Route::get('/midtrans/error', 'MidtransController@errorRedirect');
