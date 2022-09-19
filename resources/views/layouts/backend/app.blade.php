<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            {{-- POSIZIONE PER IL LOGO ORIGINALE --}}
            <h2><span class="las la-biking"></span><span>DeliveBoo</span></h2>
        </div>

        {{-- BLOCCO DEL RISTORATORE CHE HA GIà REGISTRATO I DATI DEL RISTORANTE --}}
        <div class="user-wrapper">
            <img src="" width="60px" height="60px" alt="">
            {{-- BISOGNA CRARE IL MENU A TENDINA CHE AL CLICK VISUALIZZA I DETTAGLI DEL RISTORANTE--}}
            <div class="title">
                <h4 class="ps-2">{{ Auth::user()->restaurant->restaurant_name }}</h4>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('admin') }}" class="active"><span class="las la-window-maximize"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"><span class="las la-hamburger"></span>
                        <span>Products</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.products.create') }}"><span class="las la-hamburger"></span>
                        <span>Add Products</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                        <span>Orders Details</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2 class="d-flex">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
                <ul class="navbar-nav ml-auto ps-2">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name . " " . Auth::user()->surname}}
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            {{-- BLOCCO DEL RISTORANTE DA VISUALIZZARE IN MOBILE --}}

            <div class="user-wrapper-mobile">
                <img src="" width="55px" height="55px" alt="">
                <div>
                    <h4>Nome Ristorante</h4>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
        
    </div>
</body>
</html>