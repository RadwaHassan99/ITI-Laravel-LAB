@php
    use App\View\Components\Button
@endphp

<a href="{{ $url }}" class="btn btn-{{ $type }}">
    {{ $slot }}
</a>





