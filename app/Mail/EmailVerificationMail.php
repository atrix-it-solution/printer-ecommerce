<?php

namespace App\Mail;

use App\Models\PendingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $pendingUser;
    public $verificationUrl;

    public function __construct(PendingUser $pendingUser, $verificationUrl)
    {
        $this->pendingUser = $pendingUser;
        $this->verificationUrl = $verificationUrl;
    }

    public function build()
    {
        return $this->subject('Verify Your Email Address - ' . config('app.name'))
                    ->view('emails.verify-email', [
                        'user' => $this->pendingUser,
                        'verificationUrl' => $this->verificationUrl,
                    ]);
    }
}