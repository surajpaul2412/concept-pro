<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    @yield('title')
    @yield('metas')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/images/favicon.png')}}" />
    <!-- All CSS Here --> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />  
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}" />  
    <link rel="stylesheet" href="{{asset('assets/frontend/css/themify-icons.css')}}" /> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.fancybox.min.css')}}" />   
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}" /> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
    @yield('css')
</head>
<body>
    <div id="wrapper" class="wrapper">
        @include('layouts.frontend.partials.header')

        @yield('content')

        @include('layouts.frontend.partials.footer')

        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/jquery.fancybox.js')}}"></script> 
        <script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    </div>
</body> 
</html>  

