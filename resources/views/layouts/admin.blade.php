<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <!-- Twitter meta-->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@pratikborsadiya">
        <meta property="twitter:creator" content="@pratikborsadiya">
        <!-- Open Graph Meta-->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="o	g:title" content="Vali - Free Bootstrap 4 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <title>Vali Admin - Mini-Project</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vali/css/main.css') }}">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="app sidebar-mini">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="index.html">Mini-Project</a>
            <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">
                <!--Notification Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
                    <ul class="app-notification dropdown-menu dropdown-menu-right">
                        <li class="app-notification__title">You have 4 new notifications.</li>
                        <div class="app-notification__content">
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">Lisa sent you a mail</p>
                                        <p class="app-notification__meta">2 min ago</p>
                                    </div></a></li>
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">Mail server not working</p>
                                        <p class="app-notification__meta">5 min ago</p>
                                    </div></a></li>
                            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">Transaction complete</p>
                                        <p class="app-notification__meta">2 days ago</p>
                                    </div></a></li>
                            <div class="app-notification__content">
                                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                        <div>
                                            <p class="app-notification__message">Lisa sent you a mail</p>
                                            <p class="app-notification__meta">2 min ago</p>
                                        </div></a></li>
                                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                        <div>
                                            <p class="app-notification__message">Mail server not working</p>
                                            <p class="app-notification__meta">5 min ago</p>
                                        </div></a></li>
                                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                        <div>
                                            <p class="app-notification__message">Transaction complete</p>
                                            <p class="app-notification__meta">2 days ago</p>
                                        </div></a></li>
                            </div>
                        </div>
                        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
                    </ul>
                </li>
                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-lg"></i> Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <form id="delete-form" action="{{ route('user.destroy') }}" method="POST" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset(Auth::user()->avatar) }}" alt="User Image" style="width:48px;height:48px";>
                <div>
                    <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
                    <p class="app-sidebar__user-designation">{{ Auth::user()->roles()->first()->name }}</p>
                </div>
            </div>
            <ul class="app-menu">
                <li>
                    <a class="app-menu__item active" href="{{ route('admin.dashboard') }}">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('airplane_models.index') }}">
                        <i class="app-menu__icon fa fa-fighter-jet"></i>
                        <span class="app-menu__label">Airplane Models</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('airplanes.index') }}">
                        <i class="app-menu__icon fa fa-plane"></i>
                        <span class="app-menu__label">Airplanes</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('airports.index') }}">
                        <i class="app-menu__icon fa fa-flag"></i>
                        <span class="app-menu__label">Airports</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('flights.index') }}">
                        <i class="app-menu__icon fa fa-exchange"></i>
                        <span class="app-menu__label">Flights</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('prices.index') }}">
                        <i class="app-menu__icon fa fa-money"></i>
                        <span class="app-menu__label">Prices</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="{{ route('tickets.index') }}">
                        <i class="app-menu__icon fa fa-ticket"></i>
                        <span class="app-menu__label">Tickets</span>
                    </a>
                </li>
                @if (Laratrust::hasRole('superadministrator'))
                <li>
                    <a class="app-menu__item" href="{{ route('superadmin.users') }}">
                        <i class="app-menu__icon fa fa-users"></i>
                        <span class="app-menu__label">Users</span>
                    </a>
                </li>
                @endif
                <li>
                    <a class="app-menu__item" href="{{ route('admin.dashboard') }}">
                        <i class="app-menu__icon fa fa-anchor"></i>
                        <span class="app-menu__label">Roles</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-cog"></i>
                        <span class="app-menu__label">Sitting</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
                        <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <main class="app-content">
            @yield('content')
        </main>
        <!-- Essential javascripts for application to work-->
        <script src="{{ asset('vali/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('vali/js/popper.min.js') }}"></script>
        <script src="{{ asset('vali/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vali/js/main.js') }}"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="{{ asset('vali/js/plugins/pace.min.js') }}"></script>
        <!-- Page specific javascripts-->
        <script type="text/javascript" src="{{ asset('vali/js/plugins/chart.js') }}"></script>
        <script type="text/javascript">
            var data = {
                labels: ["January", "February", "March", "April", "May"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86]
                    }
                ]
            };
            var pdata = [
                {
                    value: 300,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Complete"
                },
                {
                    value: 50,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "In-Progress"
                }
            ]
            
            var ctxl = $("#lineChartDemo").get(0).getContext("2d");
            var lineChart = new Chart(ctxl).Line(data);
            
            var ctxp = $("#pieChartDemo").get(0).getContext("2d");
            var pieChart = new Chart(ctxp).Pie(pdata);
        </script>
        <!-- Google analytics script-->
        <script type="text/javascript">
            if(document.location.hostname == 'pratikborsadiya.in') {
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', 'UA-72504830-1', 'auto');
                ga('send', 'pageview');
            }
        </script>
    </body>
</html>