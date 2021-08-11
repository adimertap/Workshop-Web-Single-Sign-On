<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewMerk extends Notification
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
            ->content("Halo")

            ->button('Lihat Pesanan', 'bengkel-kuy.com/frontoffice/pelayananservice');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
