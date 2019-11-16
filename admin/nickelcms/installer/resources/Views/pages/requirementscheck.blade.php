@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  {{ trans("System Requirements") }}
@endsection

@section('content')

  @component('nickelcms::components.logo')
    @slot('class')
      branding__img branding__img--130
    @endslot
  @endcomponent

  <div class="aligned two column row">
    <div class="twelve wide column">
      <div class="entry-text">
        <h2 class="h1">Step 1 : Pre launch check  </h2>
        @if( isset($requirements['errors']) )
          <span class="text text--special text--error">
            Looks like some of the requirements are not installed.
            Install below unchecked requirements and reload. Check
            <a title="dependency installation guide" class="link link--inline link--highlighted" target="_blank" href="https://laravel.com/docs/5.7#server-requirements">
              documentation
            </a>
            in order to install the dependencies.
          </span>
        @else
          <p class="text text--special">
            Houston we are a go. All the requirements are met, you can proceed further.
          </p>
        @endisset
      </div>
    </div>
  </div>

  <div class="aligned four column row">
    <div class="ten wide column ">
        <div class="ui horizontal segments">
        @foreach( $requirements['requirements'] as $type => $requirement )
          <div class="ui segment">
            <div class="segment__title">
              <h4 class="h4">{{ ucfirst($type) }}</h4>
            </div>

            @component('nickelcms::components.list')

              @slot('listclass')
                no-padding checklist
              @endslot

              @slot('linklists')

                @if($type == 'php')
                  @isset( $phpSupportInfo['current'] )
                    <li class="list__item">
                      <label class="wrapper_checkbox">
                        <span class="item__label">{{ $phpSupportInfo['current'] }}</span>
                        <input type="checkbox" {{ $phpSupportInfo['current'] ? 'checked' : '' }} disabled='disabled'/>
                        <div class="checkmark">
                          <i class="material-icons">done_all</i>
                        </div>
                      </label>
                    </li>
                  @endisset
                @endif

                @if($type == 'server')
                  @isset( $serverVersionInfo )
                    <li class="list__item">
                      <label class="wrapper_checkbox">
                        <span class="item__label">{{ $serverVersionInfo }}</span>
                        <input type="checkbox" {{ $serverVersionInfo ? 'checked' : '' }} disabled='disabled'/>
                        <div class="checkmark">
                          <i class="material-icons">done_all</i>
                        </div>
                      </label>
                    </li>
                  @endisset
                @endif
                @foreach($requirements['requirements'][$type] as $extention => $enabled)
                  <li class="list__item">
                    <div class="status">
                      <label class="wrapper_checkbox">
                        <span class="item__label">{{ $extention }}</span>
                        <input type="checkbox" {{ $enabled ? 'checked' : '' }} disabled='disabled'/>
                        <div class="checkmark">
                          <i class="material-icons">done_all</i>
                        </div>
                      </label>
                    </div>
                  </li>
                @endforeach
              @endslot
            @endcomponent
          </div>
        @endforeach
        </div>
      </div>
      <div class="column middle aligned">
        @component('nickelcms::components.link')
          @if( !isset($requirements['errors']) )
            @slot('location')
              {{ route('cms.environment.permissions') }}
            @endslot
          @endif
          @slot('parentclass')
            link--spacing
          @endslot
          @slot('class')
            @if(!isset($requirements['errors']))
              link__button link__button--active
            @else
              link__button
            @endif
          @endslot
          <i class="material-icons-outlined">fast_forward</i>
          @slot('identifier')
            <span class="link__sidelabel">System File permissions</span>
          @endslot
        @endcomponent
      </div>
  </div>
@endsection
