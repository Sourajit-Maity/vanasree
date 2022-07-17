

<!-- <a href="{{ route('reset.password.get', $token) }}">Reset Password</a> -->

@component('mail::message')
# Hello!

You are receiving this email because we received a password reset request for your account.
<br>
click the link below.
<br>

<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>

This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.

Thanks,<br>
VANASHRI Managing Committee
<br>
https://vanashricbechs.com/
@endcomponent
