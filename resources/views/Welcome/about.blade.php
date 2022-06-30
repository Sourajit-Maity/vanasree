<x-layouts.welcome-layout>

<div class="w3-container w3-teal">
<h1>{{$about->title}}</h1>
</div>

<div class="w3-content">

<div class="w3-row w3-margin">

<div class="w3-third">
  <img src="{{$about->banner_background_image}}" style="width:100%;min-height:200px">
</div>
<div class="w3-twothird w3-container">
  <h2>{{$about->content_heading}}</h2>
  <p>
  {!!$about->content_sub_heading!!} 
 </p>
</div>

</div>
<div class="w3-row w3-margin">

<div class="w3-third">
  <img src="{{$about->banner_image}}" style="width:100%;min-height:200px">
</div>
<div class="w3-twothird w3-container">
  <h2>{{$about->content_heading1}}</h2>
  <p>
  {!!$about->content_text!!}  
</p>
</div>

</div>

</div>
</div>

</x-layouts.welcome-layout>
