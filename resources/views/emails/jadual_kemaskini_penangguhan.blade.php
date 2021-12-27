Salam sejahtera,

Untuk makluman, terdapat perubahan pada jadual penilaian ISAC yang telah dimohon seperti berikut:

@if ($sesi == '01')
Sesi: Pertama
@elseif ($sesi == '02')
Sesi: Kedua
@elseif ($sesi == '03')
Sesi: Ketiga
@endif
@if ($tahap == '01')
Tahap: Asas
@else
Tahap: Lanjutan
@endif
Tarikh: {{$tarikh}}
Masa Mula: {{$masa_mula}}
Masa Tamat: {{$masa_tamat}}
Platform: {{$platform}}
@if ($lokasi != null)
Lokasi: {{$lokasi}}
@endif
Sebab perubahan jadual: {{$keterangan}}

Sebarang pertanyaan sila hubungi pihak INTAN di talian 03-20847777.

Sekian, terima kasih.