<?php

namespace App\Notifications;

//imports the 'User' class
use App\User;
use Illuminate\Bus\Queueable;

use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegisteredSuccessfully extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    //includes a protected global variable for the user object
    protected $user;
    //amend the constructor to include a user object parameter
    public function __construct(User $user)
    {
        //assign the passed user object to the user variable
        $this->user = $user;
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

        $user = $this->user;
        //the content of the e-mail
        return (new MailMessage)
                    ->from(env('MAIL_USERNAME'))
                    ->subject('New Account Registration')
                    ->greeting(sprintf('Dear %s', $user->name))
                    ->line('You have successfully registered to our social media network website. Please activate your account.')
                    ->action('Click Here', route('activate.user', $user->activation_code))
                    ->line('Thank you for using our application!');
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
