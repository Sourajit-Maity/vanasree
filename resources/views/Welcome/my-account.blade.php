<x-layouts.welcome-layout>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <section class="my-account cmn-gap2">
        <div class="container">
            <div class="account-info">
                <h3>User Info</h3>

                <div class="row account-row">
                    <div class="col-md-2 accout-col-left">
                        <!-- <div class="profile-image">
                            <img src="{{asset('welcome_assets/images/user-profile.png')}}" alt="">
                        </div> -->
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                        <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="col-md-10 accout-col-right">
                        <form class="form-inline">
                            <div class="accout-form">
                                <div class="row acound-form-row">
                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->first_name }}" readonly placeholder="Smith">
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->last_name }}" readonly placeholder="Williams">
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"  class="form-control" value = "{{ Auth::user()->email }}" readonly placeholder="smith.williams@yopmail.com">
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Wing Number</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->tower_number }}" readonly placeholder="ws">
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Flat Number</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->flat_number }}" readonly placeholder="1 main st">
                                        </div>
                                    </div>

                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->username }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" value = "{{ Auth::user()->phone }}" readonly placeholder="5689458975 ">
                                        </div>
                                    </div>
                                    <br><br><br><br>
                                    <div class="col-md-12 acound-form-col">
                                        <div class="form-group">
                                        <a href="{{ route('welcome.edit-account') }}" class="btn btn-success">Edit</a> 
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

             </div>
        </div>
    </section>
</x-layouts.welcome-layout>