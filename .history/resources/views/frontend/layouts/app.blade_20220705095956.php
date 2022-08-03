<!DOCTYPE html>
<html lang="">

<head>
    

   

    
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



@stack('after-scripts')

</html>