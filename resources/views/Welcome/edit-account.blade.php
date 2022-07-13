<x-layouts.welcome-layout>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                                        
             
                                        <div class="col-md-6 acound-form-col" style="display:flex;    justify-content: flex-end;
    margin-top: 31px;">
                                        <div class="form-group edit-accnt">
                                            <input type="submit" class="btn btn-success" value="Update account">
                                        </div>
                                        <a href="{{ route('welcome.home') }}" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                        </form>
                    </div>

                </div>

             </div>
       
       

          

       
       
            </div>
        



    </section>
</x-layouts.welcome-layout>
