<p>Salam sejahtera,</p>

<p class="mt-4">Tajuk: {{ $tajuk_aduan }}</p>

<p class="mt-4">Keterangan Aduan: {{ $keterangan_aduan }}</p>

@if ($file_aduan != null)
    <p class="mt-4"><a href="http://demoisac.intan.my/storage/{{ $file_aduan }}"
            target="_blank">http://demoisac.intan.my/storage/{{ $file_aduan }}</a></p>
@else
    <p class="mt-4"> Tiada Fail.</p>
@endif

<p>Keterangan Balas: {{ $keterangan_aduan_balas }}</p>

@if ($file_aduan_balas != null)
    <p class="mt-4"><a href="http://demoisac.intan.my/storage/{{ $file_aduan_balas }}"
            target="_blank">http://demoisac.intan.my/storage/{{ $file_aduan_balas }}</a></p>
@else
    <p class="mt-4"> Tiada Fail.</p>
@endif

<p class="mt-4">Sekian, terima kasih.</p>
