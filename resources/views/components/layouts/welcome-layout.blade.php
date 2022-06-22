<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->

 
  

  <!-- fabicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('welcome_assets/images/logo.png')}}">
  <!-- All CSS -->

  <!-- fontawesome -->

  <link rel="stylesheet" href="{{asset('welcome_assets/css/menu.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/style.css')}}">

  <link rel="stylesheet" href="{{asset('welcome_assets/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/brands.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/regular.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/solid.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/easy-responsive-tabs.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/style.css')}}">
  @stack('css')
</head>

<body>
  <x-welcome-includes.welcome-header />
  <div id="app">
    {{$slot}}
  </div>
  <x-welcome-includes.welcome-footer />



  <!-- <span id="scroll" style="display: none;"><i class="fas fa-angle-up"></i></span> -->

  <!-- Jquery-->
  <script src="{{asset('welcome_assets/js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('welcome_assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('welcome_assets/js/slick.min.js')}}"></script>
  <script src="{{asset('welcome_assets/js/easyResponsiveTabs.js')}}"></script>
  <script src="{{asset('welcome_assets/js/common.js')}}"></script>
  <script src="{{asset('welcome_assets/js/script.js')}}"></script>
  @stack('js')
</body>

</html>