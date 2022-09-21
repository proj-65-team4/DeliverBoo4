<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .drop {
            position: relative;

        }

        .test {
            padding-left: 1rem;
            display: block;
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
        }


        .drop-item {
            /* display: none; */
            opacity: 1;
            color: #2163b3;
            transition: all 0.4s ease;
            /* transition: height 0.5s ease; */
            font-size: 1.2rem;
            text-decoration: none;
            background-color: #fff;
            padding: 0.6rem 1.2rem; 
            width: 100%;
            border-radius: 30px 0px 0px 30px;
        }


        .drop-item a {
            color: #2163b3;
            padding: 0.4rem 0;
            transition: all 0.4s ease-in;

        }

        .drop-item a:hover {
            color: #093d7b;

            transform: scale(1.1);
            transition: all 0.4s ease-in;
        }

        /* .drop:hover .drop-item {
            padding: 0.6rem 1.2rem; 
           display: block; 
           transition: all 0.5s ease; 
            transition: height 1s ease; 
             opacity: 1; 
             position: relative;

        } */

        .drop:hover .test {
            position: relative;
            height: 100%;
        }





    </style>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar overflow-hidden">
        <div class="sidebar-brand">
            {{-- POSIZIONE PER IL LOGO ORIGINALE --}}
            <h2><span class="las la-biking"></span><span>DeliveBoo</span></h2>
        </div>

        {{-- BLOCCO DEL RISTORATORE CHE HA GIà REGISTRATO I DATI DEL RISTORANTE --}}
        <div class="user-wrapper">
            @if(!Auth::user()->restaurant)
            <img src="{{asset('img/placeholder-restaurant.png')}}" width="60px" height="60px" alt="">
            @else
            <img src="{{Auth::user()->restaurant->pathImg ? Auth::user()->restaurant->pathImg  : asset('img/placeholder-restaurant.png')}}" width="60px" height="60px" alt="">
            @endif
            {{-- BISOGNA CRARE IL MENU A TENDINA CHE AL CLICK VISUALIZZA I DETTAGLI DEL RISTORANTE--}}
            <div class="title">
                <h4 class="ps-2">{{ Auth::user()->restaurant ? Auth::user()->restaurant->restaurant_name : 'Nessun Ristorante' }}</h4>
            </div>
        </div>
        @if(Auth::user()->restaurant)
        <div class="sidebar-menu">
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ Request::route()->getName() === 'admin.dashboard' ? 'active' : '' }}"><span
                            class="las la-window-maximize"></span>
                        <span>Dashboard</span></a>
                </li>

                <li class="drop">
                    <a class="{{ Request::route()->getName() === 'admin.products.index' ? 'active' : '' }} test" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multiCollapseExample1" role="button" href="#dropmenu"><span
                            class="las la-hamburger"></span>
                        <span>Products</span>

                    </a>

                        <div class="drop-item collapse multi-collapse" id="dropmenu">
                            <a href="{{ route('admin.products.index') }}"><span class="las la-utensils"></span>Vedi
                                Menu</a>
                            <a href="{{ route('admin.products.create') }}"
                                class="{{ Request::route()->getName() === 'admin.products.create' ? 'active' : '' }}"><span
                                    class="las la-plus"></span>
                                    <span>Add Products</span></a>
                        </div>



                </li>
               

                <li>
                    <a href="{{route('admin.orders.index')}}"><span class="las la-shopping-bag"></span>
                        <span>Orders Details</span></a>
                </li>
            </ul>
        </div>
        @endif
    </div>

    <div class="main-content">
        <header>
            <h2 class="d-flex">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                <span id="dashboard">Dashboard</span>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name . ' ' . Auth::user()->surname }}
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

            {{-- BLOCCO DEL RISTORANTE DA VISUALIZZARE IN MOBILE --}}

            <div class="user-wrapper-mobile">
                @if(!Auth::user()->restaurant)
                <img src="{{asset('img/placeholder-restaurant.png')}}" width="60px" height="60px" alt="">
                @else
                <img src="{{Auth::user()->restaurant->pathImg ? Auth::user()->restaurant->pathImg  : asset('img/placeholder-restaurant.png')}}" width="60px" height="60px" alt="">
                @endif
                <div>
                    <h4>{{ Auth::user()->restaurant ? Auth::user()->restaurant->restaurant_name : 'Nome Ristorante' }}</h4>
                </div>
            </div>
        </header>

        <main style="height: 100vh; overflow: auto;">
            @yield('content')
        </main>

    </div>
</body>

</html>
