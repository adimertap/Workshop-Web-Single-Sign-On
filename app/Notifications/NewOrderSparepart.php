<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewOrderSparepart extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('436339064')
            // Markdown supported.
            ->content("Halo Bengkel" . Auth::user()->bengkel->nama_bengkel .
                "!\nAda Penjualan *Spare Part* Baru! \n*Kode Penjualan* " . $notifiable->kode_penjualan .
                "\n*Customer* " . $notifiable->customer->nama_customer .
                "\n*Total Bayar* " . $notifiable->total_bayar)

            ->button('Lihat Pesanan', 'bengkel-kuy.com/frontoffice/penjualansparepart');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
