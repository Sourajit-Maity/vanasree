<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vanashri</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <script src="{{asset('welcome_assets/js/script.js')}}"></script>
  <link rel="stylesheet" href="{{asset('welcome_assets/css/menu.css')}}">
  <link rel="stylesheet" href="{{asset('welcome_assets/css/style.css')}}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<header>
    <div class="container">
        <div class="row">
        <div class="col-sm-2"><img src="{{$homedetails->logo}}" width="100px"/></div>
            <div class="col-sm-10">
                <nav class="navigation">
                    <div class="container-fluid">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="topbar">
                            <button type="button" class="togglenavbar visible-xs">
                                <div id="nav-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </button>                              
                        </div>     
                        <div class="welcome-section">
                            <ul class="">
                                 @guest
                                    <li>Hi! User &#160;</li>
                                @else
                                    <li>Hi! {{ Auth::user()->first_name }} &#160; <a href="{{route('welcome.edit-account')}}">Profile</a></li>
                                    &nbsp;&nbsp;&nbsp;
                                    <li><a href="{{route('welcome.logout-client')}}">Logout</a></li>
                                @endguest
                            </ul>
                        </div>   
                        <div class="sidenav">
                            <ul class="">
                               <li class="nav-item {{ (\Request::segment(1) == '') ? 'active' : '' }}">
                                    <a href="{{route('welcome.home')}}" >Home</a>                               
                                </li>
                                <li class="nav-item {{ (\Request::segment(1) == 'about') ? 'active' : '' }}">
                                    <a href="{{route('welcome.about')}}" class="{{ Request::is('/about') ? 'infoabtlink' : '' }}">About us</a>
                                
                                </li>
                                @guest
                                <li id="alrt">
                                    <a href="{{route('welcome.home')}}">Circulars - Notices</a>
                                
                                </li>
                                <li id="alrt1">
                                    <a href="{{route('welcome.home')}}" >Minutes of Meetings</a>               
            
                                </li>
                                @else
                                <li class="nav-item {{ (\Request::segment(1) == 'circular-notice') ? 'active' : '' }}">
                                    <a href="{{route('welcome.circular-notice')}}">Circulars - Notices</a>
                                
                                </li>
                                <li class="nav-item {{ (\Request::segment(1) == 'minutes-of-meeting') ? 'active' : '' }}">
                                    <a href="{{route('welcome.minutes-of-meeting')}}">Minutes of Meetings</a>
                            
            
                                </li>
                                @endguest
                                <li class="nav-item {{ (\Request::segment(1) == 'gallery') ? 'active' : '' }}">
                                    <a href="{{route('welcome.gallery')}}">Photo Gallery</a>
                            
                                </li>
                                <!-- <li>
                                    <a href="{{route('welcome.contact')}}">Contact Us</a>
                            
                                </li> -->
                                
                              
                        
                            </ul>
                            <div class="secondlevelmenu"> </div>
                        </div>
                     
                        <!-- /.navbar-collapse -->
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
            @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <p>{{ Session::get('success') }}</p>
                    </div>
            @endif
        </div>
    </div>
</header>
<body>
<section>
<div class="container">
      <div class="main-container">
        <div class="main-container-content">
          <div class="change-password">
              <h4>Change Password</h4>         
                <form method="POST" action="{{ route('update-password') }}">
                        @csrf                  
                    <div class="form-group eye-pos">
                      <input id="password" type="password" placeholder="Old Password" class="form-control input-sm {{ $errors->has('current_password') ? 'is-invalid' :'' }}" name="current_password" autocomplete="current-password" value="{{ old('current_password') }}">
                      <i class="eye-icon fa fa-eye shownewpass" value="0"></i>
                      <span style="color:green">The Password must be atleast six characters</span>

                      @error('current_password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group eye-pos"> 
                      <input id="new_password" type="password" placeholder="New Password" class="form-control input-sm {{ $errors->has('new_password') ? 'is-invalid' :'' }}" name="new_password" autocomplete="current-password" {{ old('new_password') }}>
                      <i class="eye-icon fa fa-eye shownewpass" value="0"></i>
                      @error('new_password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group eye-pos">
                      <input id="new_confirm_password" placeholder="Confirm Password" type="password" class="form-control input-sm {{ $errors->has('new_confirm_password') ? 'is-invalid' :'' }}" name="new_confirm_password" autocomplete="current-password">
                      <i class="eye-icon fa fa-eye shownewpass" value="0"></i>
                      @error('new_confirm_password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <button class="btn btn-primary u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-radius-26 u-btn-1" type="submit"><span>Change Password</span></button>
                </form>
          </div>
          <!-- body header -->
        </div>
        
      </div>
    </div>
    </section>
    <footer class="u-clearfix u-footer u-grey-dark-2">
    <div class="container">
        <div class="row">
        <div class="col-sm-4"><img src="{{$homedetails->logo}}" class="u-image-circle"/></div>
            <div class="col-sm-4">
                <h5>VANASHRI</h5>
                <p>The Central Bank Employees’ Co-op. Hsg. Soc. Ltd.</p>
                <p>(Regd. No. BOM/HSG/1908/19-11-68)</p>

            </div>
            <div class="col-sm-4">
                
                    <h5>Registered Office:</h5>
                <p>Opp. Diamond Talkies,<br>
                    Lokmanya Tilak Road,<br>
                    Borivali (West),<br>
                    Mumbai – 400092<br>
                    Email: vanashri1968@gmail.com</p>
            </div>
        </div>
    </div>
</footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
        $(document).ready(function(){
            $('.shownewpass').on('click', function(){
             
              var stat = $(this).attr('value');
              // alert(stat);  
              if(stat == '0'){ 
                $(this).siblings('input').prop('type', 'text');
                $(this).attr('value', '1');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
              } else {
                $(this).siblings('input').prop('type', 'password');
                $(this).attr('value', '0');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
              }
                // $('#new_password').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
            });
            // $('#checkbox1').on('click', function(){
            //     $('#password').attr('type',$('#checkbox1').prop('checked')==true?"text":"password"); 
            // });
            // $('#checkbox2').on('click', function(){
            //     $('#new_confirm_password').attr('type',$('#checkbox2').prop('checked')==true?"text":"password"); 
            // });
        });
  </script>

</body>
</html>