<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cnf_code, $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($cnf_code = '')
    // {
    //     $this->cnf_code = $cnf_code;
    //     // dd( $this->cnf_code);
    // }
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->subject(config('app.name') . ': Forgot Password Confirmation Code')->markdown('emails.forgot_password');
    // }
    public function build()
    {
       // dd($this->token);
        return $this->markdown('emails.ForgetPassword')->with('token', $this->token);
    }
}
