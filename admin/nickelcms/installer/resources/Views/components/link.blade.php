<div class="link {{ $parentclass ?? '' }}">
    <a href="{{ $location ?? '#' }}" target="{{ $target ?? '' }}" class="link--{{ $type ?? 'solid' }} {{ $class ?? '' }}">
      {{ $slot }}
      @isset( $identifier )
      <span class="link__identifier">{{ $identifier }}</span>
      @endisset
    </a>
</div>
