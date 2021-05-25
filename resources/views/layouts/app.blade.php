<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>LiveWire Basics!</title>

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/material-kit.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

    <!-- slider -->
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('owlcarousel/owl.theme.default.min.css')}}">
   
 

    @livewireScripts
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-kit.js')}}" type="text/javascript"></script>

    <!-- slider -->
    {{-- <script src="jquery.min.js"></script> --}}
    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
    <script>
          $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
              loop:true,
              margin:20,
              responsiveClass:true,
              autoplay:true,
              responsive:{
                  0:{
                      items:1,
                      nav:true
                  },
                  600:{
                      items:3,
                      nav:true
                  },
                  1000:{
                      items:3,
                      nav:false,
                      loop:true
                  }
              }
          })
    });
   
    </script>
 

  </head>
  <body class="landing-page sidebar-collapse">
   
    {{-- <div class="nav-style">
        <div>
            <a href="/">Home</a>
            {{-- @if (auth()->check()) --}}
            @auth
              {{-- <a href="" class="">{{ Auth::user()->name }}</a> --}}
              {{-- <a href="/logout">Logout</a> --}}
              {{-- <livewire:logout /> --}}
            @endauth
            @guest
              {{-- <a href="/login">Login</a>
              <a href="/register">Register</a> --}}
            @endguest
        {{-- </div> --}}

    {{-- </div> --}} 
    {{-- @livewire('counter') --}}
    {{-- @livewire('comments') --}}
    

    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
      <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="/">
            <i>Soumik Ahammed</i>  </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" rel="tooltip" data-placement="bottom" href="" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="tooltip" data-placement="bottom" href="" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
                <i class="fa fa-facebook-square"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" rel="tooltip"  data-placement="bottom" href="" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
                <i class="fa fa-instagram"></i>
              </a>
            </li>

            <div class="" style="padding: 0 5px; font-size:20px;"> || </div>
            

            @auth
             <a href="" class="text-white">{{ Auth::user()->name }}</a>
            {{-- <a href="/logout">Logout</a> --}}
             <livewire:logout />
            @endauth

            @guest
              <li class="nav-item">
                <a class="nav-link" rel="tooltip" data-placement="bottom" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" rel="tooltip" data-placement="bottom" href="/register">Register</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

 

        {{ $slot }}
  
    

    @include('sweetalert::alert')

    


  </body>
</html>







