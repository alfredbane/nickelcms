@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  {{ trans("Create user") }}
@endsection

@section('content')

  @component('nickelcms::components.logo')
    @slot('class')
      branding__img branding__img--130
    @endslot
  @endcomponent

  <div class="aligned two column row">
    <div class="nine wide column">
      <div class="entry-text">
        <h2 class="h1"> STEP 4 : Start Onboarding.  </h2>
        <p class="text text--special">Create first user for the CMS. This user will be an admin having all the privileges.</p>
      </div>
    </div>
  </div>

  <form class="ui form aligned four column row" method="post" action="{{ route('cms.environment.storeuser') }}">
    @csrf
    <div class="ten wide column ">
      <div class="ui horizontal segments">
        <div class="ui segment">
          <div class="segment__title content--less">
            <h4 class="h4">{{ trans('DB Details') }}</h4>
          </div>
          <div class="field">
            <div class="two fields">
              <div class="field">
                <span class="field__icon"> <i class="material-icons"> account_circle </i> </span>
                <input type="text" id="username" name="username" aria-describedby="username" placeholder="Username">
              </div>
              <div class="field">
                <span class="field__icon"> <i class="material-icons"> device_hub </i> </span>
                <input type="email" id="user_email" name="user_email" aria-describedby="user_email" placeholder="User email">
                @error('user_email')
                  <span class="invalid-feedback active" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="field">
            <div class="two fields">
              <div class="field">
                <span class="field__icon"> <i class="material-icons"> view_agenda </i> </span>
                <input type="text" id="password" name="password" aria-describedby="password" placeholder="Password">

                @error('password')
                  <span class="invalid-feedback active" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="field">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="column middle aligned">
        @component('nickelcms::components.button')

          @slot('parentclass')
            link--spacing
          @endslot
          @slot('class')
            link__button link__button--active
          @endslot
          <i class="material-icons-outlined">fast_forward</i>
          @slot('identifier')
            <span class="link__sidelabel">{{ trans('Finish Installation.') }}</span>
          @endslot
        @endcomponent
      </div>
    </div>
  </form>
@endsection
