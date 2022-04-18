<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('asset/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('asset/fontawesome/css/all.min.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-light" >

        @yield('body')

        <script src="{{ asset('asset/jquery/jquery.min.js') }}"> </script>
        <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"> </script>
        <script src="{{ asset('asset/datatable/js/jquery.dataTables.min.js') }}"> </script>
        <script src="{{ asset('asset/datatable/js/dataTables.bootstrap5.min.js') }}"> </script>
        <script src="{{ asset('asset/fontawesome/js/all.min.js') }}"> </script>
        <script src="{{ asset('asset/jquery-validate/jquery.validate.min.js') }}"> </script>
        <script src="{{ asset('asset/sweetalert2/dist/sweetalert2.all.min.js') }}"> </script>
        <script type="text/javascript">
            var url_gb = '{{ url('') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('script')

    </body>
</html>
