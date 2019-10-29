<!DOCTYPE html>
<html>

<head>
    <title>@yield('pagetitle')</title>

    <!-- Bootstrap package CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Main style css -->
    <link type="text/css" rel="stylesheet" href="css/admin/style.css">

    <!-- Font Awesome Version 5  -->
    <script src="https://kit.fontawesome.com/8d0ad07784.js" crossorigin="anonymous"></script>

</head>

<body class="has-background--color-secondaryColor">

    <div class="wrapper h-100">
      @yield('content')
    </div>

    <footer class="footer">
      @include('nickelcms::layouts.footer')
    </footer>
    <!-- jQuery v3.4.1 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap package JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Toast JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <script>

      $(function () { //ready
        toastr.options.fadeOut = 6500;
        toastr.options.positionClass = 'toast-top-right';

        @if(Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}";
          switch(type){
              case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;

              case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;

              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;

              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif

      });

    </script>

</body>

</html>
