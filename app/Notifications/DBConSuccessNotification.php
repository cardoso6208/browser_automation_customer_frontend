<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DBConSuccessNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('dashboard'));
        return (new MailMessage)
            ->subject('Resolved: Database Connection Problem')
            ->line('Dear Admin,')
            ->line('We are pleased to inform you that the issue with our database connection has been successfully resolved.')
            ->action('Go Website', $url)
            ->line('Our team has worked diligently to restore normal service, and we have confirmed that all systems are now functioning as expected.')
            ->line('If you encounter any further issues or have any questions, please don\'t hesitate to reach out to our support team.')
            ->line('Thank you for your patience and understanding during this brief interruption in service.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
