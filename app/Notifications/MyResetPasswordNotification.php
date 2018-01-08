<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPasswordNotification extends ResetPassword
{
public function toMail($notifiable)
{
    return (new MailMessage())
        ->line('Você está recebendo este email, porque uma requisição de redefinição de senha foi solicitada.')
        ->action('Atualizar Senha', url(config('app.url').route('password.reset', $this->token, false)))
        ->line('Se você não fez essa requisição, não prossiga com a ação solicitada por esta mensagem.');
}

}
