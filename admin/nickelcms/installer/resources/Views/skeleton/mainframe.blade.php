<!DOCTYPE html>
<html lang="en">
<head>

  <title>@yield('pagetitle')</title>
  <meta charset="utf-8"/>
  <meta name="robots" content="noindex,nofollow"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <!-- 1.favicon -->
  @include('nickelcms::skeleton.favicons')
  <!-- favicon end here -->

  <!-- 2.DEFAULT STYLES -->

  <!-- 2.1 Semantic UI CSS -->
  <link type="text/css" rel="stylesheet" href="{{ URL::asset('admin/vendor/semantic-ui/semantic.min.css') }}">

  <!-- 2.2 Main style css -->
  <link type="text/css" rel="stylesheet" href="{{ URL::asset('admin/css/style.css') }}">

  <!-- 2.3 Material icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

  <!-- 2.4 Toast js  -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

  <!-- DEFAULT STYLES END -->

  <!-- 3.Page specific style definitions -->

  @yield('pagestyledefinitions')

  <!-- Page specific style definitions -->

</head>

<body class="{{ !empty($body_class) ? $body_class : '' }} {{ implode(' ', $defaultclasses ) }}">

    <div class="wrapper ui container aligned grid justify-content-center h-100">
      @yield('content')
    </div>

    <footer class="footer">
      <div class="ui container aligned grid">
        @include('nickelcms::layouts.footer')
      </div>
    </footer>

    <!-- 1.DEFAULT SCRIPTS -->

    <!-- 1.1 jQuery v3.4.1 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- 1.2 Semantic UI js -->
    <script src="{{ URL::asset('admin/vendor/semantic-ui/semantic.min.js') }}" crossorigin="anonymous"></script>

    <!-- 1.3 Toast JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <!-- Page specific script definitions -->

    @yield('pagescriptdefinitions')

    <!-- Page specific script definitions end -->

    <!-- ERROR TEMPLATE -->
    @include('nickelcms::skeleton.error')
    <!-- TEMPLATE ENDS -->

</body>

</html>
