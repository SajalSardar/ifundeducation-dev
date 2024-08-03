<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Env;
use Illuminate\Support\HtmlString;

class DonationNotificationFundraiser extends Notification implements ShouldQueue {
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
            ->subject('Donation')
            ->greeting('Thank You for Your Generosity!')
            ->line('Dear ' . $this->campaign->user->first_name . ' ' . $this->campaign->user->last_name)
            ->line('We are delighted to inform you that a generous donation has been made to [' . $this->campaign->title . ']')
            ->line(new HtmlString("<strong>Donation Details:<strong>"))
            ->line("Amount: $" . $this->donate->amount)
            ->line("Stripe fee: $" . $this->donate->platform_fee)
            ->line("Platform fee: $" . $this->donate->platform_fee)
            ->line("Net Balance: $" . $this->donate->net_balance)
            ->line("This contribution reflects our community's commitment to making a positive impact and supporting one another. We hope it helps you in your endeavors and brings you closer to achieving your goals.")
            ->line('Thank you for being an inspiration to us all!')
            ->action('Login', url('/login'))
            ->line('Warm regards,')
            ->line(env('APP_NAME'));
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
