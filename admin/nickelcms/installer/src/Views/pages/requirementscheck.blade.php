@extends('nickelcms::skeleton')

@section('pagetitle')
  {{ trans("System Requirements") }}
@endsection

@section('content')

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="installer-block">
      <div class="branding">
        <img width="60" height="60" class="branding__img img-responsive" title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" />
      </div>
      <div class="entry-text">
        <h3> STEP 1 : Preparing for Launch </h3>
        <p class="text text--special"> Nickel 1.0 built with Laravel has some specific requirements before it can run on your system. Check the
          <a title="dependency installation guide" class="link link--inline link--highlighted has-background--color-gradientColorFirst" target="_blank" href="https://laravel.com/docs/5.7#server-requirements">documentation</a> in order to install the dependencies.
        </p>
        @foreach($requirements['requirements'] as $type => $requirement)
        <div class="infocard infocard--type-fancy">
          <section class="infocard__header {{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">
            <div class="infocard__title">
              <h4>{{ ucfirst($type) }}</h4>
                @if($type == 'php')
                  <small class="infocard__item">
                      ( Required version : {{ $phpSupportInfo['minimum'] }} or higher )
                  </small>
                @endif
            </div>
            @if($type == 'php')
              <div class="infocard__info">
                <span class="">
                    <strong>
                        {{ $phpSupportInfo['current'] }}
                    </strong>
                    <i class="fa fa-fw fa-{{ $phpSupportInfo['supported'] ? 'check-circle-o' : 'exclamation-circle' }} row-icon" aria-hidden="true"></i>
                </span>
              </div>
            @endif
          </section>

          <section class="infocard__body">
            <ul class="list list--type-column">
              @foreach($requirements['requirements'][$type] as $extention => $enabled)
                  <li class="list__item {{ $enabled ? 'success' : 'error' }}">
                    <div class="content">
                      <span class="infocard__item float-left">{{ $extention }}</span>
                      <div class="infocard__status float-right">
                        @if(!$enabled)
                          <i class="fas fa-exclamation-triangle float-left"></i>
                        @endif
                        <label class="switch-wrap float-right">
                          <input type="checkbox" {{ $enabled ? 'checked' : '' }} disabled='disabled'/>
                          <div class="switch"></div>
                        </label>
                      </div>
                    </div>
                  </li>
              @endforeach
            </ul>
          </section>
        </div>
        @endforeach

        @if(!isset($requirements['errors']))
            <a href="{{ route('cms.environment.permissions') }}" class="link has-background--color-gradientColorSecond btn btn-solid">
              <label class="btn__text">Everything looks fine here. Go ahead.</label> <i class="btn__icon fas fa-long-arrow-alt-right"></i>
            </a>
        @endif

      </div>
    </div>
  </div>
</div>
@endsection
