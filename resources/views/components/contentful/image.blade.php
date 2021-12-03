@if ($file)
    <img src="{{ $file->getUrl($options) }}" {{ $attributes }} />
@endif
