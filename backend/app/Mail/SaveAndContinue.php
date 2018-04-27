<?php

namespace App\Mail;

use App\Answers;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveAndContinue extends Mailable
{
    use Queueable, SerializesModels;

    public $answers;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Answers $answers)
    {
        $this->answers = $answers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = env("APP_URL");
        return $this->markdown('mail.answer')->with([
                        'url' => $url . "/resume-survey/" . $this->answers->surveyId . "/" . $this->answers->token
                    ]);
    }
}
