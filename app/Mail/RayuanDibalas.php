<?php

namespace App\Mail;

use App\Models\TambahRayuan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RayuanDibalas extends Mailable
{
    use Queueable, SerializesModels;

    protected $rayuan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TambahRayuan $rayuan)
    {
        $this->rayuan = $rayuan;
        $this->tajuk = 'ISAC - Rayuan: ' . $this->rayuan->tajuk;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.rayuan_dibalas')->subject($this->tajuk)->with([
            'tajuk_rayuan'=> $this->rayuan->tajuk,
            'keterangan_rayuan' => $this->rayuan->keterangan_rayuan_send,
            'file_rayuan' => $this->rayuan->file_rayuan_send,
            'keterangan_rayuan_balas' => $this->rayuan->keterangan_rayuan_reply,
            'file_rayuan_balas' => $this->rayuan->file_rayuan_reply,
        ]);
    }
}
