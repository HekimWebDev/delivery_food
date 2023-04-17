<!doctype html>
<html lang="en">
<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>


        <!-- Custom Styling-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link href="{{ asset('assets/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/bootstrap/docs.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">

        @stack('styles')
    @show

    @livewireStyles
</head>

<body>

<x-header/>

<main style=" min-height: calc(80vh - 70px);">
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @yield('page-content')
</main>

<x-footer/>


<script type="module" src="{{ asset('assets/lib/ionicons/ionicons.esm.js') }}"></script>
<script nomodule src="{{ asset('assets/lib/ionicons/ionicons.js') }}"></script>
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>

@stack('scripts')

@livewireScripts
</body>
</html>
