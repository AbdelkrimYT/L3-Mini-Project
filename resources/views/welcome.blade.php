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
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <label class="navbar-brand">Laravel</label>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                            <i class="material-icons">recent_actors</i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                            <i class="material-icons">flight</i> Register
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user') }}">
                            <i class="material-icons">home</i> Home
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{ asset('material-kit/img/bg2.jpg') }}');">
        <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
                <h1>Laravel</h1>
                <h3>Mini-Project</h3>
            </div>
            </div>
        </div>
        </div>
    </div>
    
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
