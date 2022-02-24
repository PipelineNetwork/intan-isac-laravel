@foreach ($value as $value2)
    <img src="{{ $value2[0] }}" />
    <br>
    nama: {{ $value2[1] }}
    <br>
    ic: {{ $value2[2] }}
    <br>
@endforeach
