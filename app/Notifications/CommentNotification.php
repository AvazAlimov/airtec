<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class CommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     */
    public function __construct()
    {
        //
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

    public function toTelegram($message)
    {
        dd($message);
        return TelegramMessage::create()
            ->to(-225853152)
            ->content("*Связаться с нами*\n*ИМЯ:* ".$message->name."\n*КОНТАКТЫ:* ".$message->contact."\n*СОДЕРЖАНИЕ:*".$message->comment);
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
