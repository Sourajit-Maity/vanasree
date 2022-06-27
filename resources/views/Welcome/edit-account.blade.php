<x-layouts.welcome-layout>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<section class="my-account cmn-gap2">
        <div class="container">
            <div class="account-info edit-account">
                <h3>Edit Account info</h3>

                <div class="row account-row">
                    <div class="col-md-2 accout-col-left">
                        <div class="profile-image">
                            <img src="{{asset('welcome_assets/images/user-profile.png')}}" alt="">
                        </div>
                    </div>
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
                                            <label>Tower Number<span style="color:red"> *</span></label>
                                            <input type="text" value = "{{ Auth::user()->tower_number }}"  placeholder="Tower Number" class="form-control @error('tower_number') is-invalid @enderror" name="tower_number">
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
                                    <!-- <div class="col-md-6 acound-form-col">
                                        <div class="form-group">
                                            <label>Profile Image<span style="color:red"> *</span></label>
                                            <input type="file"  class="form-control @error('profile_photo_path') is-invalid @enderror" name="profile_photo_path">
                                            @error('profile_photo_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> -->
                                    <br><br><br><br>
                                    <div class="col-md-6 acound-form-col">
                                        <div class="form-group edit-accnt">
                                            <input type="submit" class="btn btn-success" value="Update account">
                                        </div>
                                        <div class="col-md-6 acound-form-col">
                                        <a href="{{ route('welcome.my-account') }}" class="btn btn-primary">Back</a>
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
<script>
    $(document).ready(function(){
        $("#country").change(function(){
            var val = $(this).val();
            $("#state").html('');
            var op='<option>Select State</option>';
            $("#state").append(op);
            jQuery.ajax({ 
                url : '/getstate/' +val,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    
                    for(var i=0;i<data.length;i++){
                        op='<option value="'+data[i].id+'">'+data[i].state_name+'</option>';
                        $("#state").append(op);
                    }
                }
            });
            
        });
        $(".only-numeric").bind("keypress", function (e) {
          var keyCode = e.which ? e.which : e.keyCode
               
          if (!(keyCode >= 48 && keyCode <= 57)) {
            $(".error").css("display", "inline");
            return false;
          }else{
            $(".error").css("display", "none");
          }
      });
    });
</script>