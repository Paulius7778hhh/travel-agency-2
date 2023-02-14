@inject('cart', 'App\Services\UserService')
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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/front/app.scss', 'resources/js/front/app.js'])
</head>

<body>

    <h1 class="container-fluid" style='translateX(-50%); margin:1% 0 0 44%; '>{{$title}}</h1>






    <a class="navbar-brand btn btn-info" style='translateX(-50%); margin:1% 10px 10px 2%; ' href="{{ route('logout') }}" onclick="event.preventDefault();



                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <span>uzsakymu kiekis {{$cart->s}} </span> |||| <span>suma 20 eur</span>
    @include('front.menu')



    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <footer class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; '>{{ now()->format('Y-m-d') }} {{ now()->format('H:i:s') }} {{}}</footer>





</body>

</html>
