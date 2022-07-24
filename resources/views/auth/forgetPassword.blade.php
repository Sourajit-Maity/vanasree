<x-layouts.welcome-layout>
    <style>
        .thmbtn{
             
    font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif;
    border: none;
    border-radius: 300px;
    font-weight: 700;
    text-transform: uppercase;

        }
    </style>
    <section class="login-sec">
        <div class="container">
            <div class="login-form">
                <div class="login-head">
                    <h2>Reset Password</h2> 
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <p>{{ Session::get('success') }}</p>
                    </div>
                @endif 
                <div class="login-contnt"> 
                    <!-- <h2>Reset Password</h2> -->

                    <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-2 col-form-label text-md-right">E-Mail</label>
                              <div class="col-md-10">
                                  <input type="text" id="email_address" placeholder="Enter Email" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-radius-26 u-btn-1">
                                  Send Password Reset Link
                              </button>
                          </div>
                          <!-- <div class="form-input">
                            <input type="submit" value="Send Password Reset Link" class="btn btn-primary thmbtn">
                        </div> -->
                      </form>
                </div>

            </div>
        </div>
    </section>
</x-layouts.welcome-layout>

<style>
    .reset_link_sec .card-header {
    margin: 0 0 30px;
    font-size: 16px;
}
.reset_link_sec input[type="text"], .reset_link_sec input[type="password"], .reset_link_sec input[type="email"], .reset_link_sec input[type="tel"] {
    width: 100%;
    border-radius: 5px;
    border: 1px solid #999;
    margin: 10px 0;
}
.reset_link_sec button {
    background: #2a576d;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    float: right;
    margin: 10px 0  0;
}
</style>