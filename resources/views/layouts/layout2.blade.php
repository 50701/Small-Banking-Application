<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>ABC Bank</title>
    </head>
    <body>
        
        <div class="d-flex flex-column registration_wrapper">
            <div class="page page-center">
                <div class="container container-tight py-4">
                    <div class="text-center mb-4">
                        <h1 class="navbar-brand navbar-brand-autodark">
                            <a href=".">
                                ABC Bank
                            </a>
                        </h1>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>

        
        <script src="{{ asset('js/tabler.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>