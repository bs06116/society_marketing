<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aqua City Islamabad</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{asset('assets/js/validator/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/validator/additional.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/jquery-confirm.min.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 </head>
<body>
    <div id="app">
        <aside class="theme-aside">
            <div class="top">
                <a href="{{ url('/dashboard') }}" class="text-decoration-none">
                    {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="" class="logo"> --}}
                    <h1 class="logo m-0">Aqua City</h1>
                </a>
                <button class="btn-none p-0 aside-toggle">
                    <img src="{{ asset('assets/images/svg/menu.svg') }}" alt="menu" width="22px">
                </button>
            </div>
            <ul class="menu">
                @canany(['dashbaoard'])
                <li>
                    <a href="{{ url('/dashboard') }}" <?php if(request()->is('dashboard')){ echo "class='active'";} ?> title="Dashboard">
                        <img src="{{ asset('assets/images/svg/dashboard.svg') }}" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                @endcan
                @canany(['dealer-dashbaoard'])
                <li>
                    <a href="{{ url('/dashboard-dealer') }}" title="Dashboard">
                        <img src="{{ asset('assets/images/svg/dashboard.svg') }}" alt="">
                        <span>Dashboard (Dealer)</span>
                    </a>
                </li>
                @endcan
                @canany(['commission-calculation'])
                <li>
                    <a href="{{ url('/commission-calculation') }}" <?php if(request()->is('commission-calculation')){ echo "class='active'";} ?> title="Commission Calculation">
                        <img src="{{ asset('assets/images/svg/calculation.svg') }}" alt="">
                        <span>Commission Calculation</span>
                    </a>
                </li>
                @endcan

                @canany(['plot'])
                <li>
                    <a href="{{ url('/plots') }}" <?php if(request()->is('plots')){ echo "class='active'";} ?> title="Plots">
                        <img src="{{ asset('assets/images/svg/area.svg') }}" alt="">
                        <span>Plots</span>
                    </a>
                </li>
                @endcan
                @canany(['booked-plots'])

                <li>
                    <a href="{{ url('/booked-plots') }}" <?php if(request()->is('booked-plots')){ echo "class='active'";} ?> title="Booked Plots">
                        <img src="{{ asset('assets/images/svg/area.svg') }}" alt="">
                        <span>Booked Plots</span>
                    </a>
                </li>
                @endcan

                @canany(['block'])
                <li>
                    <a href="{{ route('blocks.index') }}" title="Add Block">
                        <img src="{{ asset('assets/images/svg/block.svg') }}" alt="">
                        <span>Block</span>
                    </a>
                </li>
                @endcan

                @canany(['user-view'])
                <li>
                    <a href="{{ route('users.index') }}" <?php if(request()->is('users*')){ echo "class='active'";} ?> title="Users">
                        <img src="{{ asset('assets/images/svg/users.svg') }}" alt="">
                        <span>Users</span>
                    </a>
                </li>
                @endcan

            </ul>
        </aside>

        <main class="main">
            <nav class="theme-navbar">
                <div class="d-flex align-items-center">
                    {{-- <h1 class="mb-0"></h1> --}}
                    <button class="btn-none p-0 aside-toggle d-xl-none me-3">
                        <img src="{{ asset('assets/images/svg/menu2.svg') }}" alt="menu" width="22px">
                    </button>
                    <div id="google_translate_element"></div>
                </div>

                <div class="profile-info" id="profile-toggle">
                    <img src="{{ asset('assets/images/avatar.png') }}" alt="">
                    <div>
                        <h6>{{Auth::user()->name;}}</h6>
                        <p>{{Auth::user()->roles->pluck('name')[0] }}</p>
                    </div>
                    <img src="{{ asset('assets/images/svg/arrow-down.svg') }}" alt="" class="arrow-down">

                    <div id="profile-menu">
                        <a href="{{route('logout')}}" class="text-decoration-none" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">>
                          Logout
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>

            @yield('content')
        </main>
    </div>
    @stack('scripts')
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
</body>
</html>