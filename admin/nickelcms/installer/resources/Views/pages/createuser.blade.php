@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  {{ trans("Environment setup") }}
@endsection

@section('content')

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="installer-block">
      <div class="branding">
        <img width="60" height="60" class="branding__img img-responsive" title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" />
      </div>
      <div class="entry-text">
        <h3> STEP 4 : Send in the troops. </h3>
        <p class="text text--special"> Create a user to unleash the kraken. </p>
        <section class="infocard__body">
          <form method="post" action="{{ route('cms.environment.storeuser') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Username">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user_email">Email</label>
                  <input type="email" class="form-control" id="user_email" name="user_email" aria-describedby="user_email" placeholder="User email">

                  @error('user_email')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" aria-describedby="password" placeholder="Password">

                  @error('password')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary has-background--color-gradientColorFirst">Submit</button>
          </form>
        </section>
      </div>
    </div>
  </div>
</div>
@endsection
