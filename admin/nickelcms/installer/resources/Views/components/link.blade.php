<div class="link">
    <a href="{{ $location ?? '#' }}" target="{{ $target ?? '' }}" class="link--button link-{{ $type ?? 'solid' }} {{ $class }}">
      {{ $slot }}
      <span class="link--identifier">{{ $identifier }}</span>
    </a>
</div>
