<p>Salam sejahtera,</p>

<p class="mt-4">Tajuk: {{ $tajuk_rayuan }}</p>

<p class="mt-4">Keterangan Rayuan: {{ $keterangan_rayuan }}</p>

@if ($file_rayuan != null)
    {{-- <p class="mt-4"><a href="http://demoisac.intan.my/storage/{{ $file_rayuan }}"
            target="_blank">http://demoisac.intan.my/storage/{{ $file_rayuan }}</a></p> --}}
    <p class="mt-4"><a href="https://www.isac.intan.my/storage/{{ $file_rayuan }}"
            target="_blank">https://www.isac.intan.my/storage/{{ $file_rayuan }}</a></p>
@else
    <p class="mt-4"> Tiada Fail.</p>
@endif

<p>Keterangan Balas: {{ $keterangan_rayuan_balas }}</p>

@if ($file_rayuan_balas != null)
    {{-- <p class="mt-4"><a href="http://demoisac.intan.my/storage/{{ $file_rayuan_balas }}"
            target="_blank">http://demoisac.intan.my/storage/{{ $file_rayuan_balas }}</a></p> --}}
    <p class="mt-4"><a href="https://www.isac.intan.my/storage/{{ $file_rayuan_balas }}"
            target="_blank">https://www.isac.intan.my/storage/{{ $file_rayuan_balas }}</a></p>
@else
    <p class="mt-4"> Tiada Fail.</p>
@endif

<p class="mt-4">Sekian, terima kasih.</p>
