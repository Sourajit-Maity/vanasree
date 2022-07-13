@component('mail::message')
{{$details['mail_subject']}}
<br>
{{$details['mail_body']}}
<br>
 Number -- {{$details['notice_number']}}
<br>
 Name -- {{$details['notice_name']}}
<br>
 Date -- {{$details['notice_date']}}
<br>
 Description -- {{$details['notice_description']}}
<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent


