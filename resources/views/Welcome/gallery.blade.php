<x-layouts.welcome-layout>

<section id="gallery">
    <div class="container">
      <div id="image-gallery">
        <div class="row">
        @foreach($images as $image)
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
            <div class="img-wrapper">
              <a href="{{Storage::disk('public')->exists($image->design_photo_path) ? Storage::url($image->design_photo_path) : asset($image->design_photo_path)}}"><img src="{{Storage::disk('public')->exists($image->design_photo_path) ? Storage::url($image->design_photo_path) : asset($image->design_photo_path)}}" class="img-responsive"></a>
              <div class="img-overlay">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        @endforeach
        </div><!-- End row -->
      </div><!-- End image gallery -->
    </div><!-- End container --> 
  </section>
  </x-layouts.welcome-layout>

