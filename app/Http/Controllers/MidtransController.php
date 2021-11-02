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
        $notification = new Notification();

        // Pecah Order ID
        $order = explode('-', $notification->order_id);

        // Assign ke variabel untuk memudahkan config
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

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
            $bengkel->status_bayar = 'belum_bayar';
        } else if ($status == 'deny') {
            $bengkel->status_bayar = 'belum_bayar';
        } else if ($status == 'expired') {
            $bengkel->status_bayar = 'belum_bayar';
        } else if ($status == 'cancel') {
            $bengkel->status_bayar = 'belum_bayar';
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
