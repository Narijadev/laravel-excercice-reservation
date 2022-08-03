<link rel="stylesheet" href="/css/app.css">


<!DOCTYPE html>
<html lang="">

<head>
    

   

    <link rel="stylesheet" href="{{ mix('css/main-frontend.css')}}">
    <link rel="stylesheet" href="{{ mix('css/frontend.css')}}">
    <link rel="stylesheet" href="/css/app.css">
   
    @stack('after-styles')

</head>

<body class="{{isset($body_class) ? $body_class : ''}}">

    <!-- Header Block -->
    @include('frontend.includes.header')
    <!-- / Header Block -->
    
    <div class="wrapper">
    
        @yield('content')
        
        <!-- Footer block -->
        @include('frontend.includes.footer')
        <!-- / Footer block -->
    </div>
</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ mix('js/frontend.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

@stack('after-scripts')

</html>