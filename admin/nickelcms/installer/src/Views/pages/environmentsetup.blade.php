@extends('nickelcms::skeleton')

@section('pagetitle')
  {{ trans("Environment setup") }}
@endsection

@section('content')

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="installer-block">
      @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
      @endif
      <div class="branding">
        <img width="60" height="60" class="branding__img img-responsive" title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" />
      </div>
      <div class="entry-text">
        <h3> STEP 3 : Connect to Mission Control. </h3>
        <p class="text text--special"> Setup connection to databse and mail server. </p>
        <section class="infocard__body">
          <form method="post" action="{{ route('cms.environment.update') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Database Host</label>
                  <input type="text" class="form-control" id="db_host" name="db_host" aria-describedby="emailHelp" placeholder="Database Host">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="app_name">Database Name</label>
                  <input type="text" class="form-control" id="db_name" name="db_name" aria-describedby="db_name" placeholder="Database Name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Database User</label>
                  <input type="text" class="form-control" id="db_user" name="db_user" aria-describedby="emailHelp" placeholder="Database User">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="app_name">Database Password</label>
                  <input type="text" class="form-control" id="db_passwrd" name="db_passwrd" aria-describedby="db_name" placeholder="db_passwrd">
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
