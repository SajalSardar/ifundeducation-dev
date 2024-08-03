<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationNotificationDonor extends Notification implements ShouldQueue {
    use Queueable;

    private $donate   = null;
    private $campaign = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donate, $campaign) {
        $this->donate   = $donate;
        $this->campaign = $campaign;
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
            ->subject('Congratulations')
            ->greeting('Thank You for Your Generosity!')
            ->line('Congratulations ' . $this->donate->donar_name)
            ->line('Your contribution helps us [' . $this->campaign->title . ']')
            ->line('Thank you for being a part of our community and helping us make a positive impact!')
            ->line("Total Donation: $" . $this->donate->amount)
            ->line("Stripe fee: $" . $this->donate->platform_fee)
            ->line("Platform fee: $" . $this->donate->platform_fee)
            ->line("Fundraiser: $" . $this->donate->net_balance)
            ->action(env('APP_NAME'), url('/'))
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
