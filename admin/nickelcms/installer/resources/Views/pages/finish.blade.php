@extends('nickelcms::skeleton.mainframe', ['body_class' => 'installer__init'])

@section('pagetitle')
  {{ trans("Nickle 1.0 Installer") }}
@endsection

@section('content')

  @component('nickelcms::components.logo')
    @slot('class')
      branding__img branding__img--130
    @endslot
  @endcomponent

  <div class="aligned two column row">
    <div class="column">
      <div class="entry-text">
        <h1 class="h1">Howdy Artisan ! </h1>
        <p class="text text--special"> Installer has successfully installed the CMS instance, you can go to admin login screen to get started. However, that is not it NICKEL 1.0 has lot more to offer when it comes to create something incredible. </p>
        <p class="text text--special"> <strong>Find useful links in footer.</strong> </p>
      </div>
    </div>
  </div>

  <div class="aligned two column row">

    <div class="column">
      <p class="text text--special paragraph--spacing-top"> Happy Crafting <span class="line line--border"></span></p>
    </div>

    <div class="column middle aligned">
      <form method="GET" action="{{ route('cms.environment.finishInstall') }}">
        @component('nickelcms::components.button')
          @slot('parentclass')
            link--spacing
          @endslot
          @slot('class')
            link__button link__button--active
          @endslot
          <i class="material-icons-outlined">fast_forward</i>
          @slot('identifier')
            <span class="link__sidelabel">{{ trans('Create Something') }}</span>
          @endslot
        @endcomponent
      </form>
    </div>
  </div>
@endsection
