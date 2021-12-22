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
        $this->tajuk = 'ISAC - Aduan: ' . $this->aduan->tajuk;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aduan_dibalas')->subject($this->tajuk)->with([
            'tajuk_aduan'=> $this->aduan->tajuk,
            'keterangan_aduan' => $this->aduan->keterangan_aduan_send,
            'file_aduan' => $this->aduan->file_aduan_send,
            'keterangan_aduan_balas' => $this->aduan->keterangan_aduan_reply,
            'file_aduan_balas' => $this->aduan->file_aduan_reply,
        ]);
    }
}
