@component('mail::message')
<b>{{$details['mail_subject']}}</b>
<br>
Hi,
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
VANASHRI Managing Committee
<br>
https://vanashricbechs.com/
@endcomponent


