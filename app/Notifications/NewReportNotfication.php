<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReportNotfication extends Notification
{
    use Queueable;

    public $report;

    /**
     * Create a new notification instance.
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('aisat.adbaliuag@gmail.com', 'AISAT')
            ->subject('New' . ucfirst($this->report->type) . 'Report')
            ->line("HEALTH ALERT! A student's QR code has been scanned.")
            ->line('📌 NOTE: ' . $this->report->report_details)
            ->line('Please check the system for details.')
            ->line('---')
            ->salutation('Regards, Health Information System Asian Institute of Science and Technology');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
