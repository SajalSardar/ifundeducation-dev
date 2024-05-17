<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FundraiserUpdateNotify extends Notification implements ShouldQueue {
    use Queueable;

    private $notifyComment;
    private $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($updatePost) {
        $this->notifyComment = $updatePost->admin_comments;
        $this->status        = $updatePost->status;
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
            ->greeting('Hello!')
            ->line($this->notifyComment)
            ->line('Status: ' . $this->status)
            ->line('Thank you for using our application!');
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
