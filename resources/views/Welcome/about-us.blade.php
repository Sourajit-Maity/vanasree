<x-layouts.welcome-layout>

<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{$about->banner_background_image}}" style="width:100%;min-height:200px">
            </div>
            <div class="col-sm-6">
                <h4> {{$about->content_heading}}</h4>
                <p> {!!$about->content_sub_heading!!}</p>
               
            </div>
        </div>

        <div class="row new-bactch">
            <div class="col-sm-6 new-uer">
                <img src="{{$about->banner_image}}" style="width:100%;min-height:200px">
            </div>
            <div class="col-sm-6 new">
                <h4>{{$about->content_heading1}}</h4>
                <p> {!!$about->content_text!!} </p>                  
            </div>
        </div>
    </div>
</section>

</x-layouts.welcome-layout>
