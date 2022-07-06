@component('mail::message')
# Introduction

{{$details['mail_body']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent


