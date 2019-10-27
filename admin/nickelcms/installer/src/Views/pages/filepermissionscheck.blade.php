@extends('nickelcms::skeleton')

@section('pagetitle')
  {{ trans("File Permissions") }}
@endsection

@section('content')

<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="installer-block">
      <div class="branding">
        <img width="60" height="60" class="branding__img img-responsive" title="nickel1.0 installer" alt="logo for nickel1.0" src="https://res.cloudinary.com/nickelcdn/image/upload/v1569413988/logo_icon_yqm20u.png" />
      </div>
      <div class="entry-text">
        <h3> STEP 2 : Check system weather </h3>
        <p class="text text--special"> In order to let this laravel CMS work properly, the host system must have required permissions. Safe permissions are 755 to folder and 644 to files. </p>
        <section class="infocard__body">
          <ul class="list list--type-column">
            @foreach($permissions['permissions'] as $permission)
                <li class="list__item">
                  <div class="content">
                    <div class="list__text float-left">
                      <i class="fas fa-folder-open"></i>
                      {{ $permission['folder'] }} : {{ $permission['permission'] }}
                    </div>
                    <div class="infocard__status float-right">
                      <label class="switch-wrap float-right">
                        <input type="checkbox" {{ $permission['isSet'] ? 'checked':'' }} disabled='disabled'/>
                        <div class="switch"></div>
                      </label>
                    </div>
                  </div>
                </li>
            @endforeach
          </ul>
          @if ( ! isset($permissions['errors']))
            <a href="{{ route('cms.environment.settings') }}" class="link has-background--color-gradientColorSecond btn btn-solid">
              <label class="btn__text">Engine is roaring. Let's connect to mission control.</label> <i class="btn__icon fas fa-long-arrow-alt-right"></i>
            </a>
          @endif
        </section>
      </div>
    </div>
  </div>
</div>
@endsection
