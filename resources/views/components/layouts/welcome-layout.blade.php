
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vansari</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('welcome_assets/images/logo.png')}}">

  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/menu.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/style.css')}}">
  @stack('css')
</head>



<body>
  <x-welcome-includes.welcome-header />
  <div id="app">
    test
  </div>
  <x-welcome-includes.welcome-footer />



  <!-- <span id="scroll" style="display: none;"><i class="fas fa-angle-up"></i></span> -->

  <!-- Jquery-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('welcome_assets/js/script.js')}}"></script>
  <script src="{{asset('welcome_assets/js/new-script.js')}}"></script>
  @stack('js')
</body>

</html>