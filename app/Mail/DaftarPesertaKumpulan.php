<?php

namespace App\Mail;

use App\Models\MohonPenilaian;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DaftarPesertaKumpulan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MohonPenilaian $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.daftar_peserta_kumpulan')->with([
            'tarikh' => $this->permohonan->tarikh_sesi,
        ]);
    }
}
