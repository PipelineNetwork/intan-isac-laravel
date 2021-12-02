<?php

namespace App\Mail;

use App\Models\TambahAduan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AduanDibalas extends Mailable
{
    use Queueable, SerializesModels;

    protected $aduan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TambahAduan $aduan)
    {
        $this->aduan = $aduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aduan_dibalas')->with([
            'aduan'=> $this->aduan
        ]);
    }
}
