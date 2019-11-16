@extends('nickelcms::skeleton.mainframe')

@section('pagetitle')
  {{ trans("File Permissions") }}
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
        <h2 class="h1">STEP 2 : Check weather  </h2>
        <p class="text text--special">Permissions check fo below folders. Files permission must be proper in order to make this installer work.
        </p>
      </div>
    </div>
  </div>

  <div class="aligned four column row">
    <div class="ten wide column ">
      <div class="ui horizontal segments">
        <div class="ui segment">
          <div class="segment__title content--less">
            <h4 class="h4">{{ trans('File Permissions') }}</h4>
          </div>
          @component('nickelcms::components.list')

            @slot('listclass')
              no-padding checklist
            @endslot

            @slot('linklists')
              @foreach( $permissions['permissions'] as $permission )
                <li class="list__item">
                  <div class="status">
                    <label class="wrapper_checkbox">
                      <span class="item__label">{{ $permission['folder'] }}</span>
                      <input type="checkbox" {{ $permission['isSet'] ? 'checked':'' }} disabled='disabled'/>
                      <div class="checkmark {{ !$permission['isSet'] ? 'error':'' }} ">
                        <i class="material-icons">folder_open</i>
                      </div>
                    </label>
                  </div>
                </li>
              @endforeach
            @endslot
          @endcomponent
        </div>
      </div>
    </div>

    <div class="column middle aligned">
      @component('nickelcms::components.link')
        @slot('location')
          {{ route('cms.environment.settings') }}
        @endslot
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
          <span class="link__sidelabel">{{ trans('Setup Database') }}</span>
        @endslot
      @endcomponent
    </div>
  </div>
@endsection
