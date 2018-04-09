<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CoachingOpp extends Mailable {

    private $request;

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request) {

        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
//        dd($this->data);
        return $this->view('mail.feedback')->from('jrt@soti.net')->with('data', $this->request);
    }

}
