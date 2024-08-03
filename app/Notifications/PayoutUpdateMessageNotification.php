<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PayoutUpdateMessageNotification extends Notification implements ShouldQueue {
    use Queueable;

    private $comments   = null;
    private $userPayout = null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comments, $userPayout) {
        $this->comments   = $comments;
        $this->userPayout = $userPayout;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('Fund Transfer update')
            ->greeting('')
            ->line('Dear ' . $this->userPayout->user->first_name . ' ' . $this->userPayout->user->last_name)
            ->line("Update message: " . $this->comments)
            ->line("S/L: " . $this->userPayout->id)
            ->line("Amount: $" . $this->userPayout->amount)
            ->line("Status: " . $this->userPayout->status);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
