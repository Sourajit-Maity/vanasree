
<x-layouts.welcome-layout>

<div class="w3-container w3-teal">
<h1>Circulars - Notices</h1>
</div>

<div class="w3-content">

  @foreach($notices as $notice)
    <div class="w3-row w3-margin">
      <div class="w3-third">
        <!-- <img src="{{Storage::disk('public')->exists($notice->notice_photo_path) ? Storage::url($notice->notice_photo_path) : asset($notice->notice_image)}}" style="width:100%;min-height:200px"> -->
      </div>
      <div class="w3-twothird w3-container">
          <h2>{{$notice->id}}. - {{$notice->notice_name}}</h2>
          <h4>{{$notice->notice_date}}</h4>
          <p>{{$notice->notice_description}}  </p>          
          <a href="{{Storage::disk('public')->exists($notice->notice_photo_path) ? Storage::url($notice->notice_photo_path) : asset($notice->notice_image)}}" target="_blank">Read more</a>

      </div>
    </div>
  @endforeach
</div>

</x-layouts.welcome-layout>

