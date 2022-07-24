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

        <div class="col-sm-2"><a href="{{route('welcome.home')}}" ><img src="{{$homedetails->logo}}" width="100px"/></a></div>

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

                        @if (Session::has('success'))

<div class="alert alert-success text-center">

<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>

<p>{{ Session::get('success') }}</p>

</div>

@endif




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

                                <!--li>

                                    <a href="{{route('welcome.contact')}}">Contact Us</a>

                            

                                </li-->

                                

                              

                        

                            </ul>

                            <div class="secondlevelmenu"> </div>

                        </div>

                     

                        <!-- /.navbar-collapse -->

                        </div>

                    </div>

                    <!-- /.container-fluid -->

                </nav>

            </div>

          

        </div>

    </div>

</header>

<body>





<section class="u-section-1" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{asset($homedetails->banner_main_image)}}');

background-attachment: fixed;

    background-position: center;

    background-repeat: no-repeat;

    background-size: cover;

    padding-top:50px;

">

    <div class="container">

        <div class="row">

            <div class="col-sm-5">

              {!!$homedetails->main_banner_heading!!}

            </div>

            @guest

            <div class="col-sm-7">

                <div class="form-outer">

                <div class="u-container-layout u-container-layout-2"><span class="u-custom-color-1 u-icon u-icon-circle u-text-white u-icon-1">                   

                    <svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-b149" style="enable-background:new 0 0 60 60;"><path d="M48.014,42.889l-9.553-4.776C37.56,37.662,37,36.756,37,35.748v-3.381c0.229-0.28,0.47-0.599,0.719-0.951

                    c1.239-1.75,2.232-3.698,2.954-5.799C42.084,24.97,43,23.575,43,22v-4c0-0.963-0.36-1.896-1-2.625v-5.319

                    c0.056-0.55,0.276-3.824-2.092-6.525C37.854,1.188,34.521,0,30,0s-7.854,1.188-9.908,3.53C17.724,6.231,17.944,9.506,18,10.056

                    v5.319c-0.64,0.729-1,1.662-1,2.625v4c0,1.217,0.553,2.352,1.497,3.109c0.916,3.627,2.833,6.36,3.503,7.237v3.309

                    c0,0.968-0.528,1.856-1.377,2.32l-8.921,4.866C8.801,44.424,7,47.458,7,50.762V54c0,4.746,15.045,6,23,6s23-1.254,23-6v-3.043

                    C53,47.519,51.089,44.427,48.014,42.889z M51,54c0,1.357-7.412,4-21,4S9,55.357,9,54v-3.238c0-2.571,1.402-4.934,3.659-6.164

                    l8.921-4.866C23.073,38.917,24,37.354,24,35.655v-4.019l-0.233-0.278c-0.024-0.029-2.475-2.994-3.41-7.065l-0.091-0.396l-0.341-0.22

                    C19.346,23.303,19,22.676,19,22v-4c0-0.561,0.238-1.084,0.67-1.475L20,16.228V10l-0.009-0.131c-0.003-0.027-0.343-2.799,1.605-5.021

                    C23.253,2.958,26.081,2,30,2c3.905,0,6.727,0.951,8.386,2.828c1.947,2.201,1.625,5.017,1.623,5.041L40,16.228l0.33,0.298

                    C40.762,16.916,41,17.439,41,18v4c0,0.873-0.572,1.637-1.422,1.899l-0.498,0.153l-0.16,0.495c-0.669,2.081-1.622,4.003-2.834,5.713

                    c-0.297,0.421-0.586,0.794-0.837,1.079L35,31.623v4.125c0,1.77,0.983,3.361,2.566,4.153l9.553,4.776

                    C49.513,45.874,51,48.28,51,50.957V54z"></path>

                </svg>

                </span>

                            <h3 class="u-custom-font u-font-montserrat u-text u-text-default u-text-3">Welcome</h3>

                            <div class="u-form u-login-control u-white u-form-1">

                            <form action="{{ route('welcome.login-client') }}" method="POST"  style="padding: 30px;">

                                @csrf

                                <div class="u-form-group u-form-name">

                                    <label for="username-a30d" class="u-label">Username *</label>

                                    <input type="text" placeholder="Enter your username or email"  name="username" class="u-grey-5 u-input u-input-rectangle u-input-1 form-control @error('email') is-invalid @enderror" required="">

                                    @error('email')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                    @enderror

                                </div>

                                <div class="u-form-group u-form-password form-input">

                                    <label for="password-a30d" class="u-label">Password *</label>

                                    <input type="password" placeholder="Enter your Password" id="password-a30d" name="password" class="u-grey-5 u-input u-input-rectangle u-input-2form-control @error('password') is-invalid @enderror"  required="">

                                    @error('password')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                    @enderror

                                </div>

                                <div class="u-align-right u-form-group u-form-submit">

                                    <input type="submit" value="Login"  class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-radius-26 u-btn-1">

                                </div>

                            </form>

                            </div>

                            <a href="{{ route('forget.password.get') }}" class="u-border-active-palette-2-base u-border-hover-palette-1-base u-border-none u-btn u-button-style u-login-control u-login-forgot-password u-none u-text-grey-40 u-text-hover-palette-4-base u-btn-2">Forgot password?</a>

                        </div> 

                        @else

                        <div class="col-sm-7">

                <div class="form-outer">

                <div class="u-container-layout u-container-layout-2"><span class="u-custom-color-1 u-icon u-icon-circle u-text-white u-icon-1">                   

                    @if(Auth::user()->profile_photo_path != null)

                        <img src="{{url('assets/images')}}/{{ Auth::user()->profile_photo_path}}" class="u-align-left u-image u-image-default u-image-1 userimg" width="180" height="100"/>

                    @elseif($subdata['image'] != null)

                    <img src="{{$subdata['image']}}" class="u-align-left u-image u-image-default u-image-1 userimg" width="180" height="100"/>

                    @else

                    <svg class="u-svg-content" viewBox="0 0 60 60" x="0px" y="0px" id="svg-b149" style="enable-background:new 0 0 60 60;"><path d="M48.014,42.889l-9.553-4.776C37.56,37.662,37,36.756,37,35.748v-3.381c0.229-0.28,0.47-0.599,0.719-0.951

                    c1.239-1.75,2.232-3.698,2.954-5.799C42.084,24.97,43,23.575,43,22v-4c0-0.963-0.36-1.896-1-2.625v-5.319

                    c0.056-0.55,0.276-3.824-2.092-6.525C37.854,1.188,34.521,0,30,0s-7.854,1.188-9.908,3.53C17.724,6.231,17.944,9.506,18,10.056

                    v5.319c-0.64,0.729-1,1.662-1,2.625v4c0,1.217,0.553,2.352,1.497,3.109c0.916,3.627,2.833,6.36,3.503,7.237v3.309

                    c0,0.968-0.528,1.856-1.377,2.32l-8.921,4.866C8.801,44.424,7,47.458,7,50.762V54c0,4.746,15.045,6,23,6s23-1.254,23-6v-3.043

                    C53,47.519,51.089,44.427,48.014,42.889z M51,54c0,1.357-7.412,4-21,4S9,55.357,9,54v-3.238c0-2.571,1.402-4.934,3.659-6.164

                    l8.921-4.866C23.073,38.917,24,37.354,24,35.655v-4.019l-0.233-0.278c-0.024-0.029-2.475-2.994-3.41-7.065l-0.091-0.396l-0.341-0.22

                    C19.346,23.303,19,22.676,19,22v-4c0-0.561,0.238-1.084,0.67-1.475L20,16.228V10l-0.009-0.131c-0.003-0.027-0.343-2.799,1.605-5.021

                    C23.253,2.958,26.081,2,30,2c3.905,0,6.727,0.951,8.386,2.828c1.947,2.201,1.625,5.017,1.623,5.041L40,16.228l0.33,0.298

                    C40.762,16.916,41,17.439,41,18v4c0,0.873-0.572,1.637-1.422,1.899l-0.498,0.153l-0.16,0.495c-0.669,2.081-1.622,4.003-2.834,5.713

                    c-0.297,0.421-0.586,0.794-0.837,1.079L35,31.623v4.125c0,1.77,0.983,3.361,2.566,4.153l9.553,4.776

                    C49.513,45.874,51,48.28,51,50.957V54z"></path>

                </svg>

                    @endif

                </span>

                            <h3 class="u-custom-font u-font-montserrat u-text u-text-default u-text-3">Welcome</h3>

                            <div class="u-form u-login-control u-white u-form-1">

                            <form action="#" method="POST"  style="padding: 30px;">

                                @csrf

                                <div class="u-form-group u-form-name">

                                    <input type="text" readonly value = "Full Name :: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="username" class="u-grey-5 u-input u-input-rectangle u-input-1 form-control @error('email') is-invalid @enderror" required="">

                                    

                                </div>

                                <div class="u-form-group u-form-name">

                                    <input type="text" readonly value = "Email :: {{ Auth::user()->email }}" name="username" class="u-grey-5 u-input u-input-rectangle u-input-1 form-control @error('email') is-invalid @enderror" required="">

                                    

                                </div>

                                <div class="u-form-group u-form-name">

                                    <input type="text" readonly value = "Username :: {{ Auth::user()->nick_name }}" name="username" class="u-grey-5 u-input u-input-rectangle u-input-1 form-control @error('email') is-invalid @enderror" required="">

                                    

                                </div>

                                <div class="u-form-group u-form-password form-input">

                                    <input type="text" readonly value = "Wing Number :: {{ Auth::user()->tower_number }}" id="password-a30d" name="password" class="u-grey-5 u-input u-input-rectangle u-input-2form-control @error('password') is-invalid @enderror"  required="">

                                   

                                </div>

                                <div class="u-form-group u-form-password form-input">

                                    <input type="text" readonly value = "Flat Number :: {{ Auth::user()->flat_number }}" id="password-a30d" name="password" class="u-grey-5 u-input u-input-rectangle u-input-2form-control @error('password') is-invalid @enderror"  required="">

                                  

                                </div>

                                <!-- <div class="u-align-right u-form-group u-form-submit">

                                    <a href="{{ route('welcome.edit-account') }}" class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-radius-26 u-btn-1">Edit</a>

                                </div> -->

                            </form>

                            </div>              

                        @endguest

                        </div>

            </div>

        </div>

    </div>

</section>



<section class="u-section-2">

    <div class="container">

        <div class="row">

            <div class="col-sm-8">

                <img src="{{$homedetails->banner_badge_image}}" class="u-align-left u-image u-image-default u-image-1" width="1280" height="853"/>

                <img src="{{$homedetails->banner_background_image}}" class="u-align-left u-image u-image-default u-image-2" width="1280" height="853"/>

            </div>

            <div class="col-sm-4">

                <h2>{{$homedetails->banner_heading}}</h2>

                <p>{{$homedetails->banner_sub_heading}}</p>

                <a href="{{route('welcome.about')}}">view more</a>

            </div>

        </div>

    </div>

</section>



<section class="u-custom-color-1">

    <div class="container">

        <div class="row">        

            <div class="col-sm-4">            

     <img src="{{$homedetails->content1_image}}"/>

             <h3 class="u-text u-text-1">{{$homedetails->content1_heading}}</h3>

             <div class="u-align-left u-border-3 u-border-white u-line u-line-horizontal u-line-1"></div>

             <p class="u-text u-text-2">{!!$homedetails->content1_text!!}</p>

            </div>



            <div class="col-sm-4">

            

                <img src="{{$homedetails->content2_image}}"/>

                 <h3 class="u-text u-text-1">{{$homedetails->content2_heading}}</h3>

                 <div class="u-align-left u-border-3 u-border-white u-line u-line-horizontal u-line-1"></div>

                 <p class="u-text u-text-2">{!!$homedetails->content2_text!!}</p>                     

                </div>

                <div class="col-sm-4">

                    <img src="{{$homedetails->content3_image}}"/>

                     <h3 class="u-text u-text-1">{{$homedetails->content3_heading}}</h3>

                     <div class="u-align-left u-border-3 u-border-white u-line u-line-horizontal u-line-1"></div>

                     <p class="u-text u-text-2">{!!$homedetails->content3_text!!}</p>                    

        

                    </div>

    </div>

</section>





<section class="u-section-4" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{asset($homedetails->banner_setup_image)}}');

background-attachment: fixed;

background-position: center;

background-repeat: no-repeat;

background-size: cover; 

padding: 50px 0;

">

<div class="container">

    <div class="row">

        <div class="col-sm-6">

        <div class="u-image u-image-circle u-image-1" alt="" data-image-width="1280" data-image-height="960" data-pswp-item-id="0" data-gallery-uid="2"><img src="{{asset($homedetails->setup_image)}}"/></div>

        </div>

        <div class="col-sm-6">

            <h2>{{$homedetails->content2_option_heading1}}</h2>

            <p class="u-text u-text-white u-text-2"> {!!$homedetails->content2_option_text1!!}</p>

            <a href="{{route('welcome.about')}}" class="u-border-2 u-border-custom-color-1 u-btn u-btn-round u-button-style u-custom u-radius-50 u-text-white u-btn-1">view more</a>

        </div>

    </div>

</div>



</section>





<section class="u-section-5">



    <div class="container">

        <div class="row">

            <div class="col-sm-5">

               <div class="text-center"> <img src="{{$homedetails->logo}}" class="u-image-1"/></div>

                <h5>{{$homedetails->content2_option_heading2}}</h5>

                <p class="u-text u-text-2"> {!!$homedetails->content2_option_text2!!}</p>

            </div>

            <div class="col-sm-7">

                <div class=""></div>

                <img src="{{$homedetails->content2_option_image1}}" alt="" class="u-align-left u-image u-image-default u-opacity u-opacity-45 u-image-2" data-image-width="1280" data-image-height="853">

                <img src="{{$homedetails->content2_option_image2}}" alt="" class="u-align-left u-image u-image-default u-image-3" data-image-width="1280" data-image-height="853">

            </div>

        </div>

    </div>

</section>

<section class="u-clearfix u-custom-color-1 u-section-6">

    <div class="container">

        <div class="row">

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image22}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image3}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image4}}"/></div>

        </div>

        <div class="row">

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image5}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image6}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image7}}"/></div>

        </div>

        <div class="row">

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image8}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image9}}"/></div>

            <div class="col-sm-4"><img src="{{$homedetails->content2_option_image10}}"/></div>

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
                <a href="{{route('welcome.contact')}}">Contact Us</a>
                <p>All rights reserved © Vanashri CBECHSL</p>


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

<div id='toTop'><img src="{{asset('welcome_assets/images/icons.jpg')}}"/></div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script type="text/javascript">



  $(document).ready(function() {

  

    $('#alrt').on('click', function(e) {

      alert('Please Login First')

    });

    $('#alrt1').on('click', function(e) {

      alert('Please Login First')

    });



    

});

</script>

<script src="{{asset('welcome_assets/js/new-script.js')}}"></script>

<script>

    $(window).scroll(function() {

    if ($(this).scrollTop()) {

        $('#toTop').fadeIn();

    } else {

        $('#toTop').fadeOut();

    }

});



$("#toTop").click(function () {

   $("html, body").animate({scrollTop: 0}, 1000);

});

    </script>



</body>

</html>