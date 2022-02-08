<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeringatanTukarKatalaluan extends Mailable
{
    use Queueable, SerializesModels;

    protected $calon;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($calon)
    {
        $this->calon = User::where('id', $calon)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.peringatan_tukar_katalaluan')->subject('ISAC - Peringatan Tukar Katalaluan');
    }
}
