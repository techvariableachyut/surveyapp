<?php

namespace App\Mail;

use App\Questions;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveAndContinue extends Mailable
{
    use Queueable, SerializesModels;

    public $questions;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Questions $questions)
    {
        $this->questions = $questions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.answer');
    }
}
