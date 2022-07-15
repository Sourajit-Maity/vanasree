<x-admin.form-section submit="saveOrUpdate" enctype="multipart/form-data">
    <x-slot name="form">
        <div class="">
            <div class="single-add-stage">
                <div class="row">
                    <div class="col-lg-12">
                    <x-admin.form-group class="col-lg-12">
                            <x-admin.input type="text" wire:model.defer="gallery_name" placeholder="Gallery Name"   class="{{ $errors->has('gallery_name') ? 'is-invalid' :'' }} single-add-stage" />
                            <x-admin.input-error for="gallery_name" />
                        </x-admin.form-group>
                    </div>
                </div>
               
                </div>
            </div>
            </div>
        </div>
        @foreach($service_design as $key => $value)
            <div class="single-add-stage">
                    <div class="row">
                        <div class="col-lg-6">
                            <x-admin.form-group class="col-lg-12">
                                    <x-admin.input type="text" wire:model.defer="design_name.{{$key}}"    class="{{ $errors->has('design_name.'.$key) ? 'is-invalid' :'' }} single-add-design" />
                                    <x-admin.input-error for="'design_name.'.{{$key}}"/>
                                    @if( $errors)
                                    <div class="invalid-feedback">Design name field is required</div>
                                    @endif

                                    <x-admin.input type="hidden" wire:model.defer="design_id.{{$key}}"    class="{{ $errors->has('design_id') ? 'is-invalid' :'' }} single-add-design" />
                                    <x-admin.input-error for="design_id"/>
                            </x-admin.form-group>

                            <x-admin.form-group class="col-lg-12">
                                <x-admin.input type="text" wire:model.defer="design_price.{{$key}}"   class="{{ $errors->has('design_price.'.$key) ? 'is-invalid' :'' }} single-add-design only-numeric" />
                                <x-admin.input-error for="design_price.{{$key}}" />
                            </x-admin.form-group>

                            <x-admin.form-group class="col-lg-12">
                                <x-admin.textarea type="text" wire:model.defer="design_description.{{$key}}"   class="{{ $errors->has('design_description.'.$key) ? 'is-invalid' :'' }}" rows='8' />  
                            </x-admin.form-group>
                            
                    </div>
                        <div class="col-lg-6">
                            <x-admin.form-group class="col-lg-12">
                                <div class="upload-image edit_area new-upload-gap">
                                    @if($photo && isset($photo[$key]))
                                    <img src="{{ $photo[$key]->temporaryUrl() }}">
                                    @endif
                                    <img src="{{ config('app.site_url').Storage::url($value->design_photo_path) }}" alt="">
                                    <div class="mid_upload @if( isset($value->design_photo_path))savedesign @endif">
                                        <div class="upload_area">
                                            <label class="icon-image"></label>
                                            <x-admin.input type="file" wire:model.defer="photo.{{$key}}"   class="{{ $errors->has('photo') ? 'is-invalid' :'' }}" accept="image/*"/>
                                            <x-admin.input-error for="photo" />
                                        </div>
                                    </div>
                                </div>
                            </x-admin.form-group>
                            <x-admin.input-error for="design_description.{{$key}}" />
                        </div>
                </div>
        @endforeach

        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" class="page-btn page-btn-primary"  color="success" wire:loading.attr="disabled"><span><i class="icon-message-alt-add wrap_i"></i> Save Changes</span></x-admin.button>
    </x-slot>
</x-form-section>
@push('js')
<script>
    $(document).ready(function(){

        $(".only-numeric").bind("keypress", function (e) {
          var keyCode = e.which ? e.which : e.keyCode

          if (!(keyCode >= 48 && keyCode <= 57)) {
            $(".error").css("display", "inline");
            return false;
          }else{
            $(".error").css("display", "none");
          }
      });
    });
</script>
<script>
            jQuery(document).ready(function($) {

        if (window.history && window.history.pushState) {

        window.history.pushState('forward', null);

        $(window).on('popstate', function() {
            alert('Changes that you made may not be saved.');
        });

        }
        });
</script>
        <script>
            $(document).ready(function(){
                $('#select2').select2();
                $('#select2').on('change', function (e) {
                    var data = $('#select2').select2("val");
                    @this.set('service_order_id', data);
                });
                $("#select2").select2({
                    theme: "classic",
                    placeholder: "Event Type",
                });
            });
        </script>
@endpush
