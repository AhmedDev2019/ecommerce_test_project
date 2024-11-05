<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- My Style  -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    <div id="app">
        
        <!-- Include Header .  -->
        @include('partials._header')


        <!-- Main Content  -->
        <main class="py-4 container mb-5">
            @yield('content')
        </main>

        <!-- Include Footer  -->
        @include('partials._footer')

    </div>

    <!-- JQuery CDN  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Swal Notification  -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <!-- // My Custom Script  -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    <script>
        $(document).ready(function() {

            // Success Message ...
            @if( session()->has('success') )
                swal({
                    title: "{{ session()->get("success") }}",
                    icon: "success",
                    button : "Ok"
                });
            @endif

            // Error Message ...
            @if( session()->has('error') )
                swal({
                    title: "{{ session()->get("error") }}",
                    icon: "error",
                    button : "Ok"
                });
            @endif

            // Warning Message ...
            @if( session()->has('warning') )
                swal({
                    title: "{{ session()->get("warning") }}",
                    icon: "warning",
                    button : "Ok"
                });
            @endif

            // Info Message ...
            @if( session()->has('info') )
                swal({
                    title: "{{ session()->get("info") }}",
                    icon: "info",
                    button : "Ok"
                });
            @endif

            // Confirm Delete .... ??!
            $(document).on('click' , '.delete' ,function(e){

                e.preventDefault();

                var that = $(this);

                swal({
                    title: "Confirm Delete",
                    icon: "error",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                        that.closest('form').submit();
                    }
                });

            });

        } );
    </script>
</body>
</html>
