<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FundTransferNotification extends Notification implements ShouldQueue {
    use Queueable;

    private $userPayout = null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userPayoutData) {
        $this->userPayout = $userPayoutData;
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
            ->subject('Fund Transfer')
            ->greeting('')
            ->line('Dear ' . $this->userPayout->user->first_name . ' ' . $this->userPayout->user->last_name)
            ->line("Amount: $" . $this->userPayout->amount)
            ->line("Transaction Id: " . $this->userPayout->balance_transaction)
            ->line("Destination: " . $this->userPayout->destination)
            ->line("Transfer Time: " . $this->userPayout->transaction_time)
            ->line("Status: " . $this->userPayout->status)
            ->action('Login', url('/login'));
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
