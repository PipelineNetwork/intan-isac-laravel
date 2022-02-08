<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\MohonPenilaian;

class PeringatanTidakHadir extends Mailable
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
        $this->calon = MohonPenilaian::where('id', $calon)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.peringatan_tidak_hadir')->subject('ISAC - Peringatan Tidak Hadir')->with([
            'nama_calon' => $this->calon->nama,
            'tarikh'=>$this->calon->tarikh_sesi,
        ]);
    }
}
