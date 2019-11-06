@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  {{ trans("Environment setup") }}
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
        <h2 class="h1">STEP 3 : Connect to Mission Control.  </h2>
        <p class="text text--special">Setup connection to databse, add host and db name.</p>
      </div>
    </div>
  </div>

  <form class="ui form aligned four column row" method="post" action="{{ route('cms.environment.settings.update') }}">
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
                  <span class="field__icon"> <i class="material-icons"> public </i> </span>
                  <input type="text"  id="db_host" name="db_host" value="{{ old('db_host') ? old('db_host') : '127.0.0.1' }}" aria-describedby="Database Host" placeholder="DB Host">
                  @error('db_host')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="field">
                  <span class="field__icon"> <i class="material-icons"> device_hub </i> </span>
                  <input type="text"  id="db_host_port" value="{{ old('db_host_port') ? old('db_host_port') : 27017  }}" name="db_host_port" aria-describedby="Database Host Port" placeholder="Port">
                </div>
              </div>
            </div>
            <div class="field">
              <div class="two fields">
                <div class="field">
                  <span class="field__icon"> <i class="material-icons"> view_agenda </i> </span>
                  <input type="text"  id="db_name" value="{{ old('db_name') }}" name="db_name" aria-describedby="db_name" placeholder="Db name">
                  @error('db_name')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="field">
                  <span class="field__icon"> <i class="material-icons"> account_circle </i> </span>
                  <input type="text"  id="db_user" value="{{ old('db_user') }}" name="db_user" aria-describedby="db_user" placeholder="Db User">
                  @error('db_user')
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
                  <span class="field__icon"> <i class="material-icons"> lock </i> </span>
                  <input type="text"  id="db_passwrd" value="" name="db_passwrd" aria-describedby="db_passwrd" placeholder="Password">
                  @error('db_passwrd')
                    <span class="invalid-feedback active" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                </div>
                <div class="field">
                  <span class="field__icon"> <i class="material-icons"> create </i> </span>
                  <input type="text"  id="db_prefix" value="{{ old('db_prefix') }}" name="db_prefix" aria-describedby="db_prefix" placeholder="Db prefix">
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
            <span class="link__sidelabel">{{ trans('Create Administrator') }}</span>
          @endslot
        @endcomponent
      </div>
    </div>
  </form>
@endsection
