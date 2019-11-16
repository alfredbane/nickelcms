<div class="aligned two column row">

  <div class="column">
    @component('nickelcms::components.link')
      @slot('target')
        _blank
      @endslot
      @slot('class')
        link--font-small
      @endslot
      @slot('location')
        https://github.com/alfredbane/nickelcms/blob/master/LICENSE
      @endslot
      LICENSED UNDER GPL v3.0
    @endcomponent
  </div>

  <div class="right aligned column">

    @component('nickelcms::components.list')
      @slot('listclass')
        list__nav
      @endslot
      @slot('type')
        horizontal
      @endslot
      @slot('linklists')
        @foreach ( config('installer.footerlinks') as $item=>$value )
          <li class="link__nav__item">
            <a class="item" {{ !empty( $value['target'] ) ? "target=".$value['target'] : '' }} href="{{ $value['url'] }}">
              {{ $item }}
            </a>
          </li>
        @endforeach
      @endslot
    @endcomponent

  </div>

</div>
