<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material-kit/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('material-kit/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Laravel
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('material-kit/css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
    <link href="{{ asset('material-kit/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">

    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('welcome') }}">Laravel</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('login') }}">
                            <i class="material-icons">account_circle</i>Login
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="material-icons">settings</i>Register
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('user.profile') }}">
                            <i class="material-icons">face</i>Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('login') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                            <i class="material-icons">delete</i>Delete
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="material-icons">anchor</i>Logout
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="profile-photo dropdown-toggle nav-link profile-photo-small">
                                <img src="{{ asset('material-kit/img/faces/avatar.jpg') }}" alt="Circle Image" class="rounded-circle img-fluid">
                            </div>
                        </div>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <form id="delete-form" action="{{ route('user.destroy') }}" method="POST" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                @endif
            </ul>
        </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('material-kit/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('material-kit/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('material-kit/js/material-kit.js?v=2.0.7') }}" type="text/javascript"></script>
</body>

</html>