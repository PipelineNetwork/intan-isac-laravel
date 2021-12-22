<?php

namespace App\Mail;

use App\Models\TambahRayuan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RayuanDicipta extends Mailable
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
        return $this->view('emails.rayuan_dicipta')->subject($this->tajuk)->with([
            'nama_rayuan' => $this->rayuan->NAMA_PESERTA
        ]);
    }
}
