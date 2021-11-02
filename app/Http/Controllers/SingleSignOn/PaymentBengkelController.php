<?php

namespace App\Http\Controllers\SingleSignOn;

use App\Http\Controllers\Controller;
use App\Model\SingleSignOn\Bengkel;
use App\Model\SingleSignOn\PaymentBengkel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use PhpParser\Node\Stmt\TryCatch;

class PaymentBengkelController extends Controller
{
    public function payment(Request $request)
    {
        $payment_bengkel = PaymentBengkel::create([
            'id_bengkel' => Auth::user()->bengkel->id_bengkel,
            'status' => 'belum_bayar'
        ]);

        // set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $bengkel = Bengkel::all();

        // array dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => $payment_bengkel->id_payment_bengkel,
                'gross_amount' => 100000,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->bengkel->nama_bengkel,
                'phone' => Auth::user()->bengkel->nohp_bengkel,
            ],
            'enable_payments' => ['gopay'],
            'vtweb' => []
        ];

        try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
