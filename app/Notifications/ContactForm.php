<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactForm extends Notification implements ShouldQueue
{
    use Queueable;

    public $mail_data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
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
        $nom_prenoms = $this->mail_data['nom_prenoms'] ?? "";
        $email = $this->mail_data['email'] ?? "";
        $telephone = $this->mail_data['telephone'] ?? "";
        $objet = $this->mail_data['objet'] ?? "";
        $message = $this->mail_data['message'] ?? "";

        return (new MailMessage)
                    ->greeting('Nouveau Message')
                    ->subject("Formulaire de contact Rapide Reparation")
                    ->line("Nom prénoms : ${nom_prenoms}")
                    ->line("Email : ${email}")
                    ->line("Numéro de téléphone : ${telephone}")
                    ->line("Object : ${objet}")
                    ->line("Message : ${message}");
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
