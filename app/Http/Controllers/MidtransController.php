<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\Bengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();;

        // Assign ke variabel untuk memudahkan config
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;

        // Cari transaksi berdasarkan id
        $bengkel = Bengkel::where(Auth::user()->id_bengkel);

        // Handle notification status Midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $bengkel->status_bayar = 'lunas';
                } else {
                    $bengkel->status_bayar = 'lunas';
                }
            }
        } else if ($status == 'settlement') {
            $bengkel->status_bayar = 'lunas';
        } else if ($status == 'pending') {
            $bengkel->status_bayar = 'lunas';
        } else if ($status == 'deny') {
            $bengkel->status_bayar = 'lunas';
        } else if ($status == 'expired') {
            $bengkel->status_bayar = 'lunas';
        } else if ($status == 'cancel') {
            $bengkel->status_bayar = 'lunas';
        }

        // Simpan Transaksi
        $bengkel->save();
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.singlesignon.midtrans.finish');
    }

    public function unfinishRedirect(Request $request)
    {
        return view('pages.singlesignon.midtrans.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.singlesignon.midtrans.error');
    }
}
