<p>Salam sejahtera,</p>

<p class="mt-4">Untuk makluman, terdapat perubahan pada jadual penilaian ISAC yang telah dimohon seperti
    berikut:</p>

<p class="mt-4">
    @if ($sesi == '01')
        Sesi: Pertama

    @elseif ($sesi == '02')
        Sesi: Kedua

    @elseif ($sesi == '03')
        Sesi: Ketiga
    @endif
</p>
<p class="mt-2">
    @if ($tahap == '01')
        Tahap: Asas
    @else
        Tahap: Lanjutan
    @endif
</p>
<p class="mt-2">Tarikh: {{ $tarikh }}</p>
<p class="mt-2">Masa Mula: {{ $masa_mula }}</p>
<p class="mt-2">Masa Tamat: {{ $masa_tamat }}</p>
<p class="mt-2">Platform: {{ $platform }}</p>
<p class="mt-4">
    @if ($lokasi != null)
        Lokasi: {{ $lokasi }}
    @endif
</p>
<p class="mt-2">Sebab perubahan jadual: {{ $keterangan }}</p>

<p class="mt-4">Sebarang pertanyaan sila hubungi pihak INTAN di talian 03-20847777.</p>

<p class="mt-4">Sekian, terima kasih.</p>
