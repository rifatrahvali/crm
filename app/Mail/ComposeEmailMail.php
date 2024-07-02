<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComposeEmailMail extends Mailable{
    use Queueable, SerializesModels;

    public $save;
    public function __construct($save){
        $this->save = $save;
    }
    public function build(){
        return $this->markdown('admin.email.ComposeEmailMail')->subject(config('app.name').', Yeni Mail Gönderildi.');
    }
}