@extends('nickelcms::skeleton')

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
        <h3> STEP 3 : Connect to Mission Control. </h3>
        <p class="text text--special"> Setup connection to databse and mail server. </p>
        <section class="infocard__body">
          <form method="post" action="{{ route('cms.environment.settings.update') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="db_host">Database Host</label>
                  <input type="text" class="form-control" id="db_host" name="db_host" value="{{ old('db_host') ? old('db_host') : '127.0.0.1' }}" aria-describedby="Database Host" placeholder="Database Host">
                  @error('db_host')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="db_host_port">Database Host Port</label>
                  <input type="text" class="form-control" id="db_host_port" value="{{ old('db_host_port') ? old('db_host_port') : 27017  }}" name="db_host_port" aria-describedby="Database Host Port" placeholder="Database Port">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="db_name">Database Name</label>
                  <input type="text" class="form-control" id="db_name" value="{{ old('db_name') }}" name="db_name" aria-describedby="db_name" placeholder="Database Name">

                  @error('db_name')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="db_user">Database User</label>
                  <input type="text" class="form-control" id="db_user" value="{{ old('db_user') }}" name="db_user" aria-describedby="db_user" placeholder="Database User">

                  @error('db_user')
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
                  <label for="app_name">Database Password</label>
                  <input type="text" class="form-control" id="db_passwrd" value="" name="db_passwrd" aria-describedby="db_passwrd" placeholder="Database password">

                  @error('db_passwrd')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="app_name">Database prefix</label>
                  <input type="text" class="form-control" id="db_prefix" value="{{ old('db_prefix') }}" name="db_prefix" aria-describedby="db_prefix" placeholder="Database prefix">
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
