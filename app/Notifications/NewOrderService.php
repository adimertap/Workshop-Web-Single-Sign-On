<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewOrderService extends Notification
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
            ->content("Halo " . Auth::user()->pegawai->nama_pegawai .
                "!\nAda Penerimaan *Service* Baru! \n*Kode Service* " . $notifiable->kode_sa .
                "\n*Customer* " . $notifiable->customer_bengkel->nama_customer .
                "\n*Total Bayar* " . $notifiable->total_bayar)

            ->button('Lihat Pesanan', 'bengkel-kuy.com/frontoffice/pelayananservice');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
