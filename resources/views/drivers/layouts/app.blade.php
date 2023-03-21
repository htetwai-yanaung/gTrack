<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>gTrack</title>

    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">{{ Auth::user()->name }}</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Drivers
                    </li>

                    <li class="sidebar-item @if(Route::currentRouteName() == 'driver.checkList') active @endif">
                        <a class="sidebar-link" href="{{ route('driver.checkList') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span
                                class="align-middle">Check List</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Workbook
                    </li>
                    <li class="sidebar-item @if(Route::currentRouteName() == 'workbook.index') active @endif">
                        <a class="sidebar-link" href="{{ route('workbook.create') }}">
                            <i class="align-middle" data-feather="book-open"></i> <span
                                class="align-middle">WorkBook</span>
                        </a>
                    </li>
                    <li class="sidebar-item @if(Route::currentRouteName() == 'workbook.history') active @endif">
                        <a class="sidebar-link" href="{{ route('workbook.history') }}">
                            <i class="align-middle" data-feather="book"></i> <span
                                class="align-middle">History</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                       Setting
                    </li>
                    <li class="sidebar-item @if(Route::currentRouteName() == 'driver.index') active @endif">
                        <a class="sidebar-link" href="{{ route('driver.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span
                                class="align-middle">Profile</span>
                        </a>
                    </li>
                </ul>


            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ url('images/default-driver.png') }}" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-menu dropdown-menu-end">
                                @csrf
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>

                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" href="#">Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                Powered by gTrack - Fleet Management System
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('js/app.js') }}"></script>
    @yield('scriptSource')
</body>

</html>
