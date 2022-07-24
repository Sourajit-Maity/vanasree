<x-layouts.welcome-layout>

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
                   

                    <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-8">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-8">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                  <span style="color:green">The Password must be atleast six characters</span>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-8">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-input col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-primary u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-radius-26 u-btn-1" value="Reset Password">
                        </div>
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