<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Font Awesome 4.7.0 -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte/adminlte.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin-skin/skin-purple.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/sweet-alert/sweetalert2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/jquery-ui/jquery-ui.min.css') }}" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/adminlte/adminlte-select2.min.css') }}" />

    <!-- toastr v2.1.3 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/cms-styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/datatables/css/datatables.min.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="main-header" style="box-shadow: 1px solid black">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-mini"><b>PSA</b></span>
                <span class="logo-lg">
                    <b>
                        {{ config('app.name', 'Laravel') }}
                    </b>
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('user.index') }}">User</a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
                @auth
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs"></span>Profile
                            </a>
                        </li>
                    </ul>
                </div>
                @endauth
            </nav>
        </header>
        <section class="content">
            @yield('content')

        </section>
    </div>
    <!-- jQuery v3.4.1 -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('js/jquery/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('js/fastclick/fastclick.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte/adminlte.min.js') }}"></script>

    <!-- SWEET ALERT -->
    <script src="{{ asset('js/sweet-alert/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- CMS SCRIPTS (must on buttom)-->
    <script src="{{ asset('js/cms-scripts.js') }}"></script>

    <script src="{{ asset('plugins/datatables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/datatables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('.table-datatables').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                fixedColumns: true,
                autoWidth: false,
                fixedHeader: {
                    "header": false,
                    "footer": false
                },
                ajax: '{{ route('getDataTable') }}',
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%',
                        visible: false,
                        className: 'center'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%',
                        className: 'center action'
                    }
                ],
                order: [
                    [0, "asc"]
                ],
                columnDefs: [{
                        targets: 0,
                        sortable: false,
                        orderable: false
                    },
                    {
                        targets: 1,
                        sortable: true,
                        orderable: true
                    },
                    {
                        targets: 2,
                        sortable: false,
                        orderable: false
                    },
                    {
                        targets: 3,
                        width: '120px',
                        sortable: true,
                        orderable: true
                    }
                ],
                drawCallback: function () {
                    INIT.tooltip();
                    INIT.run();
                },
            });
        });

    </script>
</body>

</html>
