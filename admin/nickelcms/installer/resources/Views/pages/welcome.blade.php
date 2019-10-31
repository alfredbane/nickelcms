@extends('nickelcms::skeleton.mainframe', ['body_class' => 'installer__init'])

@section('pagetitle')
  Nickle 1.0 Installer
@endsection

@section('content')
<div class="ui container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-3 border--right">
      <div class="branding">
        <img title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1572260248/nickel--darkv2_jdnb8i.png" class="branding__img branding__img--130 img-responsive" />
      </div>
    </div>
    <div class="col-md-5">
      <div class="entry-text">
        <h3>Howdy Artisan ! </h3>
        <p class="text text--special"> Introducing NICKEL 1.0 , an open source laravel CMS. Crafted just for your upcoming creation.  </p>

        @component('nickelcms::components.link')
          @slot('location')
            {{ route('cms.environment.requirements') }}
          @endslot
          @slot('class')
            link--button link--button-active
          @endslot
          <i class="material-icons-outlined">fast_forward</i>
          @slot('identifier')
            <label class="nextText">System requirements</label>
          @endslot
        @endcomponent

      </div>
    </div>
  </div>
</div>
@endsection
