<x-layouts.welcome-layout>

<div class="w3-container w3-teal">
<h1>Minutes of Meetings</h1>
</div>

<div class="w3-content">

  @foreach($moms as $mom)
    <div class="w3-row w3-margin">
      <div class="w3-third">
        <!-- <img src="{{Storage::disk('public')->exists($mom->mom_photo_path) ? Storage::url($mom->mom_photo_path) : asset($mom->mom_image)}}" style="width:100%;min-height:200px"> -->
      </div>
      <div class="w3-twothird w3-container">
          <h2>{{$mom->id}}. - {{$mom->mom_name}}</h2>
          <h4>{{$mom->mom_date}}</h4>
          <p>{{$mom->mom_description}}  </p>         
          <a href="{{Storage::disk('public')->exists($mom->mom_photo_path) ? Storage::url($mom->mom_photo_path) : asset($mom->mom_image)}}" target="_blank">Read more</a>
      </div>
    </div>
  @endforeach
</div>

</x-layouts.welcome-layout>
