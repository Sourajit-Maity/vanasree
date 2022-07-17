
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
                                <li>
                                    <a href="{{route('welcome.home')}}">Circulars - Notices</a>
                                
                                </li>
                                <li>
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
                                <li>
                                    <a href="{{route('welcome.contact')}}">Contact Us</a>
                            
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

<div class="w3-container w3-teal">
<h1>Circulars - Notices</h1>
</div>

<div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    
                </div>
            </div>
           
            
            <div class="table-responsive">
               <br>
        <table id="myTable" class="table table-bordered {{ count($notices) > 0 ? 'datatable' : '' }} pointer">
                    <thead>
                        <tr>
                            <th>SL.No</th>
                            <th>Notice Number</th>
                            <th>Notice Name</th>
                            <th>Notice Date</th>
                            <th>Notice Description</th>
                            <th>View Details</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($notices) > 0)
                            @foreach ($notices as $index => $notice)
                            @if($index % 2 == 0  )
                                <tr data-entry-id="h" class="eventr">
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $notice->notice_number }}</td>
                                    <td>{{ $notice->notice_name }}</td>
                                    <td>{!! \Carbon\Carbon::parse($notice->notice_date)->format('d M Y') !!}</td>
                                    <td>{{ $notice->notice_description }}</td>
                                    <td><a href="{{Storage::disk('public')->exists($notice->notice_photo_path) ? Storage::url($notice->notice_photo_path) : asset($notice->notice_image)}}" target="_blank">Read more</a></td>                                   
                                </tr>
                                @else
                                <tr data-entry-id="h" class="oddtr">
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $notice->notice_number }}</td>
                                    <td>{{ $notice->notice_name }}</td>
                                    <td>{!! \Carbon\Carbon::parse($notice->notice_date)->format('d M Y') !!}</td>
                                    <td>{{ $notice->notice_description }}</td>
                                    <td><a href="{{Storage::disk('public')->exists($notice->notice_photo_path) ? Storage::url($notice->notice_photo_path) : asset($notice->notice_image)}}" target="_blank">Read more</a></td>                                   
                                </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No entries in table</td>
                            </tr>
                        @endif
                    </tbody>
        </table>
            <div class="d-flex justify-content-center">
                 {!! $notices->links() !!}
            </div>
            </div>
        </div>
    </div>

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
<div id='toTop'><img src="{{asset('welcome_assets/images/icons.jpg')}}"/></div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
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

