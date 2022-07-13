@component('mail::message')
# Introduction
{{$details['mail_subject']}}
<br>
{{$details['mail_body']}}
<br>
Your Nick Name will be {{$details['nick_name']}}
<br>
Your password will be {{$details['password']}}
<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent


