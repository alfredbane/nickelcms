@extends('nickelcms::skeleton')

@section('pagetitle')
  {{ trans("Error Handler") }}
@endsection

@section('content')

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="installer-block">
      <div class="branding">
        <img width="60" height="60" class="branding__img img-responsive" title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" />
      </div>
      <div class="entry-text">
        {{ $notification }}
      </div>
    </div>
  </div>
</div>
@endsection
