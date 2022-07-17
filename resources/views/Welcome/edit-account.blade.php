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

<section class="my-account cmn-gap2">
        <div class="container">
            <div class="account-info edit-account">

                <h3>Edit Account info</h3>

                <div class="row account-row">
                   
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                        <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="col-md-10 accout-col-right">
                       
                    <form method="POST" action="{{ route('welcome.update-account', $users->id) }}" enctype="multipart/form-data"  class="form-inline">
                        @csrf                
                            <div class="accout-form">
                                <div class="row acound-form-row">
                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>First Name<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->first_name }}"  placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Last Name<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->last_name }}"  placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Email<span style="color:red"> *</span></label>
                                            <input type="email" value = "{{ Auth::user()->email }}"  placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Wing Number<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->tower_number }}"  placeholder="Wing Number" class="form-control @error('tower_number') is-invalid @enderror" name="tower_number">
                                            @error('tower_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Flat Number<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->flat_number }}"  placeholder="Flat Number" class="form-control @error('flat_number') is-invalid @enderror" name="flat_number">
                                            @error('flat_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Phone<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->phone }}"  placeholder="Phone " class="form-control @error('phone') is-invalid @enderror only-numeric" name="phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Profile Image<span style="color:red"> *</span></label>
                                            <input type="file"  class="form-control @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path">
                                            @error('profile_photo_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br><br><br><br>
                                </div>
                            </div>
                            <div class="col-md-12 acound-form-col btn-bottom">             
                                <div class="col-md-8 acound-form-col" style="display:flex; justify-content: flex-end;margin-top: 31px;">   
                                    <div class="form-group edit-accnt">
                                        <input type="submit" class="btn btn-success" value="Update">
                                        <a href="{{ route('welcome.change-password') }}" class="btn btn-primary">Set Password</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
    </body>
</html>
