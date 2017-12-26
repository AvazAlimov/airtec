<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class OrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     * @return array
     * @internal param mixed $notifiable
     */
    public function via()
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($order)
    {
        return TelegramMessage::create()
            ->to(-225853152)
            ->content("*ЗАКАЗ*\n*ИМЯ:* ".$order->name."\n*КОНТАКТЫ:* ".$order->phone."\n*ПРОДУКТ:* ".$this->product->name."\n*КОЛИЧЕСТВО:* ".$order->number);
    }

    /**
     * Get the mail representation of the notification.
     * @return MailMessage
     * @internal param mixed $notifiable
     */
    public function toMail()
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     * @return array
     * @internal param mixed $notifiable
     */
    public function toArray()
    {
        return [
            //
        ];
    }
}
