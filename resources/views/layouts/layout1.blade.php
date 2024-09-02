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
        
        <div class="main">

            <div class="page_header">
                <header class="navbar navbar-expand-md d-print-none">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                            <a href="/">
                                ABC Bank
                            </a>
                        </h1>
                    </div>
                </header>
                <header class="navbar-expand-md">
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <div class="navbar">
                            <div class="container">
                                <ul class="navbar-nav">
                                    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('home') }}">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block {{ Route::is('home') ? 'text-indigo' : '' }}"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                            </span>
                                            <span class="nav-link-title {{ Route::is('home') ? 'text-indigo' : '' }}">
                                                Home
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Route::is('deposit.form') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('deposit.form') }}">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block {{ Route::is('deposit.form') ? 'text-indigo' : '' }}"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" /><path d="M9 15l3 -3l3 3" /><path d="M12 12l0 9" /></svg>
                                            </span>
                                            <span class="nav-link-title {{ Route::is('deposit.form') ? 'text-indigo' : '' }}">
                                                Deposit
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Route::is('withdraw.form') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('withdraw.form') }}">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block {{ Route::is('withdraw.form') ? 'text-indigo' : '' }}"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4" /><path d="M12 13l0 9" /><path d="M9 19l3 3l3 -3" /></svg>
                                            </span>
                                            <span class="nav-link-title {{ Route::is('withdraw.form') ? 'text-indigo' : '' }}">
                                                Withdraw
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Route::is('transfer.form') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('transfer.form') }}">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block {{ Route::is('transfer.form') ? 'text-indigo' : '' }}"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-transfer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 10h-16l5.5 -6" /><path d="M4 14h16l-5.5 6" /></svg>
                                            </span>
                                            <span class="nav-link-title {{ Route::is('transfer.form') ? 'text-indigo' : '' }}">
                                                Transfer
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Route::is('statement') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('statement') }}">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block {{ Route::is('statement') ? 'text-indigo' : '' }}"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-invoice"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
                                            </span>
                                            <span class="nav-link-title {{ Route::is('statement') ? 'text-indigo' : '' }}">
                                                Statement
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Logout
                                            </span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <div class="page_body {{ Route::is('statement') ? 'statement_wrapper' : '' }}">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>

        </div>
          

        <script src="{{ asset('js/tabler.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>