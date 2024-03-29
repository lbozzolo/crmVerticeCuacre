<?php

namespace App\Notifications;

use App\EmailNotificationSetting;
use App\Leave;
use App\Traits\SmtpSettings;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LeaveStatusReject extends Notification implements ShouldQueue
{
    use Queueable, SmtpSettings;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $leave;
    public function __construct(Leave $leave)
    {
        $this->leave = $leave;
        $this->emailSetting = EmailNotificationSetting::all();
        $this->setMailConfigs();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = ['database'];

        if($this->emailSetting[6]->send_email == 'yes'){
            array_push($via, 'mail');
        }

        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $notifiable;
        $url = url('/');

        return (new MailMessage)
            ->subject( __('email.leaves.statusSubject').' - '.config('app.name'))
            ->greeting(__('email.hello').' '.ucwords($user->name).'!')
            ->line(__('email.leave.reject').':- ')
            ->line(__('app.date').': '.$this->leave->leave_date->format('d M, Y'))
            ->line(__('app.status').': '.ucwords($this->leave->status))
            ->line(__('app.reason').': '.ucwords($this->leave->reject_reason))
            ->action(__('email.loginDashboard'), $url)
            ->line(__('email.thankyouNote'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->leave->toArray();
    }
}
