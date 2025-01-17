<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin, $otp;

    public function __construct($admin, $otp)
    {
        $this->admin = $admin;
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->view('mails.reset-password')
            ->subject('Reset Password')
            ->with(['otp' => $this->otp]);
    }
}
