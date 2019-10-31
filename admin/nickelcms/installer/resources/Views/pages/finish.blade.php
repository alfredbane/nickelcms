@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  Nickle 1.0 Installer
@endsection

@section('content')
<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-3 border--right">
      <div class="branding">
        <img title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" class="branding__img branding__img--130 img-responsive" />
      </div>
    </div>
    <div class="col-md-5">
      <div class="entry-text">
        <h3>Houston, we are good to go ! T -0 seconds</h3>
        <p class="text text--special"> Introducing NICKEL 1.0 , an open source laravel CMS. Crafted just for your upcoming creation.  </p>
        <form method="GET" action="{{ route('cms.environment.finishInstall') }}">
          <button type="submit" class="btn btn-primary has-background--color-gradientColorFirst">Let's craft something wonderful.</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
