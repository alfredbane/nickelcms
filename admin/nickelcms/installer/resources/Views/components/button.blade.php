<div class="button {{ $parentclass ?? '' }}">
  <button type="submit" class="button--{{ $type ?? 'solid' }} {{ $class ?? '' }}">
    {{ $slot }}
    @isset( $identifier )
    <span class="link__identifier">{{ $identifier }}</span>
    @endisset
  </button>
</div>
