<?php

namespace App\Mail;

use App\Models\Jadual;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JadualKemaskiniPembatalan extends Mailable
{
    use Queueable, SerializesModels;

    protected $jadual;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Jadual $jadual)
    {
        $this->jadual = $jadual;
        $this->tajuk = 'ISAC - Kemaskini Jadual: Pembatalan';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.jadual_kemaskini_pembatalan')->subject($this->tajuk)->with([
            'sesi' => $this->jadual->KOD_SESI_PENILAIAN,
            'tahap' => $this->jadual->KOD_TAHAP,
            'tarikh' => $this->jadual->TARIKH_SESI,
            'masa_mula' => $this->jadual->KOD_MASA_MULA,
            'masa_tamat' => $this->jadual->KOD_MASA_TAMAT,
            'platform' => $this->jadual->platform,
            'lokasi' => $this->jadual->LOKASI,
            'keterangan' => $this->jadual->keterangan,
        ]);
    }
}
