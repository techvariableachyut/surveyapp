<?php

namespace App\Mail;

use App\Answers;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

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
    public function build(Request $request)
    {
        return $this->markdown('mail.answer')->with([
            'url' => $request->getSchemeAndHttpHost() . "/resume-survey/" . $this->answers->surveyId . "/" . $this->answers->token
        ]);
    }
}
