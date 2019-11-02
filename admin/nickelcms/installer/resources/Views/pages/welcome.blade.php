@extends('nickelcms::skeleton.mainframe', ['body_class' => 'installer__init'])

@section('pagetitle')
  Nickle 1.0 Installer
@endsection

@section('content')
  <div class="five wide column">
    <div class="branding">
      <img title="nickel1.0 installer" alt="logo for nickel1.0" src="{{ config('installer.cdnimages.logo') }}" class="branding__img branding__img--130 img-responsive" />
    </div>
  </div>

  <div class="aligned two column row">
    <div class="column">
      <div class="entry-text">
        <h1>Howdy Artisan ! </h1>
        <p class="text text--special"> Introducing NICKEL 1.0 , an open source laravel CMS. Crafted just for your upcoming creation. Click the button to install.  </p>
      </div>
    </div>
  </div>

  <div class="aligned two column row">
    
    <div class="column">
      <p class="text text--special paragraph--spacing-top"> NICKEL v1.0 <span class="line line--border"></span></p>
    </div>

    <div class="column middle aligned">
      @component('nickelcms::components.link')
        @slot('location')
          {{ route('cms.environment.requirements') }}
        @endslot
        @slot('parentclass')
          link--spacing
        @endslot
        @slot('class')
          link__button link__button--active
        @endslot
        <i class="material-icons-outlined">fast_forward</i>
        @slot('identifier')
          <span class="link__sidelabel">System requirements</span>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
