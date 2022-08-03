<!DOCTYPE html>
<html lang="">

<head>
    

   

    
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
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