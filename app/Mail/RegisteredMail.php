<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $save;

    public function __construct($save)
    {
        $this->save = $save;
    }

    public function build()
    {
        return $this->markdown('admin.email.RegisteredMailPage')
            ->subject(config('app.name') . ' - Yeni Kullanıcı Kaydı');


    }
}