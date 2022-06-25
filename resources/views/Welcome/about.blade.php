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
</head>
<body>
  
<header>
<div class="container">
    <div class="row">
        <div class="col-sm-3"><img src="{{asset('welcome_assets/images/logo.png')}}" width="100px"/></div>
        <div class="col-sm-9">
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
        
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="sidenav">
                    <ul class="">
                                <li>
                                    <a href="{{route('welcome.home')}}">Home</a>
                                
                                </li>
                                <li>
                                    <a href="{{route('welcome.about')}}">Circulars - Notices</a>
                                
                                </li>
                                <li>
                                    <a href="{{route('welcome.home')}}">Minutes of Meetings</a>
                            
            
                                </li>
                                <li>
                                    <a href="{{route('welcome.gallery')}}">Photo Gallery</a>
                            
                                </li>
                                <li>
                                    <a href="{{route('welcome.about')}}">About us</a>
                                
                                </li>
                        
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

<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Sample Headline</h2>
            </div>
            <div class="col-sm-6">
                <h4> Sample Headline</h4>
                <p>Sample text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien lorem, finibus sed maximus dictum, sodales eget dui. Nullam aliquam diam ut est eleifend, et molestie erat rutrum. Mauris et erat condimentum, iaculis nunc id, lacinia dolor. Integer consequat nisi interdum libero. </p>
                <h4>Sample Headline</h4>
                <p>Sample text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien lorem, finibus sed maximus dictum, sodales eget dui. Nullam aliquam diam ut est eleifend, et molestie erat rutrum</p>
                <a href="#">learn more</a>
                   
            </div>
        </div>
    </div>
</section>

<footer class="u-clearfix u-footer u-grey-dark-2">
    <div class="container">
        <div class="row">
        <div class="col-sm-4 text-center"><img src="{{asset('welcome_assets/images/logo.png')}}" class="u-image-circle"/></div>
            <div class="col-sm-4">
                <h5>VANASHRI</h5>
                <p>The Central Bank Employees’ Co-op. Hsg. Soc. Ltd.
                    (Regd. No. BOM/HSG/1908/19-11-68)</p>
                    <h5>Registered Office:</h5>
                <p>Opp. Diamond Talkies,<br>
                    Lokmanya Tilak Road,<br>
                    Borivali (West),<br>
                    Mumbai – 400092<br>
                    Email: vanashri1968@gmail.com</p>

            </div>
            <div class="col-sm-4 text-center">
                <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-8dc3"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
                    c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
                            </a>
                            <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-3519"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
                    c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
                    c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
                    c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
                    c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
                            </a>
                            <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-174e"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
                    z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
                    C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
                    c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
                            </a>
                            <a class="u-social-url" title="pinterest" target="_blank" href=""><span class="u-icon u-social-icon u-social-pinterest u-icon-4"><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-86ac"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M61.1,76.9c-4.7-0.3-6.7-2.7-10.3-5c-2,10.7-4.6,20.9-11.9,26.2c-2.2-16.1,3.3-28.2,5.9-41
                    c-4.4-7.5,0.6-22.5,9.9-18.8c11.6,4.6-10,27.8,4.4,30.7C74.2,72,80.3,42.8,71,33.4C57.5,19.6,31.7,33,34.9,52.6
                    c0.8,4.8,5.8,6.2,2,12.9c-8.7-1.9-11.2-8.8-10.9-17.8C26.5,32.8,39.3,22.5,52.2,21c16.3-1.9,31.6,5.9,33.7,21.2
                    C88.2,59.5,78.6,78.2,61.1,76.9z"></path></svg></span>
                            </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>