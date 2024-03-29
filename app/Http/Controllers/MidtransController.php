<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\Bengkel;
use App\Model\SingleSignOn\PaymentBengkel;
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
        $id_payment_bengkel = $notification->order_id;

        $payment_bengkel = PaymentBengkel::findOrFail($id_payment_bengkel);

        // Handle notification status Midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $payment_bengkel->status = 'belum_bayar';
                } else {
                    $payment_bengkel->status = 'lunas';
                }
            }
        } else if ($status == 'settlement') {
            $payment_bengkel->status = 'lunas';
        } else if ($status == 'pending') {
            $payment_bengkel->status = 'belum_bayar';
        } else if ($status == 'deny') {
            $payment_bengkel->status = 'belum_bayar';
        } else if ($status == 'expired') {
            $payment_bengkel->status = 'belum_bayar';
        } else if ($status == 'cancel') {
            $payment_bengkel->status = 'belum_bayar';
        }

        // Simpan Transaksi
        $payment_bengkel->save();

        // return ('ok');
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
