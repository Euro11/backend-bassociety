<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BasSociety</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('css/backoffice/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Custom Styles-->
    <link href="{{asset('css/backoffice/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="{{asset('css/backoffice/dataTables.bootstrap.css')}}" rel="stylesheet" />
    @yield('stylesheets')
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/admin/home') }}"><i class="fas fa-basketball-ball"></i> <strong>BasSociety</strong></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider" />
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="side-bar">
                        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/news') }}"><i class="far fa-newspaper"></i> N E W S</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/sportsci') }}"><i class="fas fa-atom"></i> Sport Sci</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/vdo') }}"><i class="fas fa-video"></i> VDO</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/calendar') }}"><i class="far fa-calendar-alt"></i> Calendar</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/teams') }}"><i class="fas fa-basketball-ball"></i> Teams</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/tag') }}"><i class="fas fa-tag"></i> Tag</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/category') }}"><i class="fas fa-chalkboard-teacher"></i> Webboard</a>
                    </li>
                    <li class="side-bar">
                        <a href="{{ url('admin/users') }}"><i class="fas fa-user"></i> Users management</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- jQuery Js -->
    <script src="{{asset('js/backoffice/jquery-1.10.2.js')}}"></script>
    <!-- Bootstrap Js -->
    <script src="{{asset('js/backoffice/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Js -->
    <script src="{{asset('js/backoffice/jquery.metisMenu.js')}}"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="{{asset('js/backoffice/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/backoffice/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- JS Scripts-->
    @yield('scripts')
</body>

</html>
