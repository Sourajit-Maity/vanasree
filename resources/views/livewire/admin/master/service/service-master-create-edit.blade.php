<x-admin.form-section submit="saveOrUpdate" enctype="multipart/form-data">

    <x-slot name="form">
        <div class=""> 
            <div class="single-add-stage">
                 <div class="row">
                    <div class="col-lg-6">
                        <x-admin.form-group class="col-lg-12">
                                <x-admin.input type="text" wire:model.defer="gallery_name" placeholder="Gallery Name"   class="{{ $errors->has('gallery_name') ? 'is-invalid' :'' }} single-add-stage" />
                                <x-admin.input-error for="gallery_name" />
                        </x-admin.form-group>
                    </div>
                </div>  
            </div>         
            <div class="single-add-stage">
                <div class="row">
                    <div class="col-lg-6">
                        
                        <x-admin.form-group class="col-lg-12">    
                                <x-admin.input type="text" wire:model.defer="design_name.0" placeholder="Image Name"   class="{{ $errors->has('design_name.0') ? 'is-invalid' :'' }} single-add-design" />
                                <x-admin.input-error for="design_name.0" />
                        </x-admin.form-group>

                        
                        <x-admin.form-group class="col-lg-12"> 
                            <x-admin.textarea type="text" wire:model.defer="design_description.0" placeholder="Description"  class="{{ $errors->has('design_description.0') ? 'is-invalid' :'' }}" rows='8' />
                            <x-admin.input-error for="design_description.0" />                                  
                       </x-admin.form-group> 
                </div>
                    <div class="col-lg-6">  
                        <x-admin.form-group class="col-lg-12">                  
                            <div class="upload-image">
                                @if ($photos && isset($photos[0]))                                       
                                    <img src="{{ $photos[0]->temporaryUrl() }}">
                                @endif
                                <div class="mid_upload @if($photos && isset($photos[0]))savedesign @endif">
                                <div class="upload_area">
                                    <label class="icon-image" for="file"></label>                                  
                                    <x-admin.input type="file" wire:model.defer="photos.0"   class="{{ $errors->has('photos') ? 'is-invalid' :'' }}" accept="image/*"/>
                                   
                                </div>
                                    <div class="uploadText">
                                        <span>Upload Image</span>
                                        <span>Please use size of 612*424</span>
                                    </div>
                                </div>
                            </div> 
                        </x-admin.form-group>   
                        @error('photos.0')
                            <p style="color:red;text-align:center;">{{$message}}</p>
                        @enderror                                        
                    </div>
            </div>
                   
                     <div class="col-lg-12">
                        <button class="add-more" wire:click.prevent="add({{$i}})"><span class="icon-message-alt-add"></span>Add More</button>
                    </div>
            </div>       
        </div>
        @foreach($inputs as $key => $value)
            <div class="">               
                <div class="single-add-stage">
                    <div class="row">
                            <div class="col-lg-6">
                                <x-admin.form-group class="col-lg-12">   
                                    <x-admin.input type="text" wire:model.defer="design_name.{{ $value }}" placeholder="Image Name"   class="{{ $errors->has('design_name.'.$value)? 'is-invalid' :'' }} single-add-design" />
                                    <x-admin.input-error for="design_name.{{ $value }}" />
                                </x-admin.form-group>
                                <x-admin.form-group class="col-lg-12"> 
                                    <x-admin.textarea type="text" wire:model.defer="design_description.{{ $value }}" placeholder="Description"  class="{{ $errors->has('design_description.'.$value) ? 'is-invalid' :'' }}" rows='8' />
                                    <x-admin.input-error for="design_description.{{ $value }}" />                                  
                                </x-admin.form-group> 
                            </div>            
                        <div class="col-lg-6">
                        <x-admin.form-group class="col-lg-12"> 
                            <div class="upload-image">
                                @if ($photos && isset($photos[$value]))                                       
                                    <img src="{{ $photos[$value]->temporaryUrl() }}">
                                @endif
                                <div class="mid_upload @if($photos && isset($photos[$value]))savedesign @endif">
                                    <div class="upload_area">
                                        <label class="icon-image" for="file"></label>                                       
                                        <x-admin.input type="file" wire:model.defer="photos.{{ $value }}"   class="{{ $errors->has('photos') ? 'is-invalid' :'' }}" accept="image/*" />
                                    
                                    </div>
                                    <div class="uploadText">
                                            <span>Upload Image</span>
                                            <span>Please use size of 612*424</span>
                                        </div>
                                    </div>
                            </div>
                            </x-admin.form-group>
                            @error('photos.'.$value)
                                    <p style="color:red;text-align:center;">{{$message}}</p>
                            @enderror
                        </div>
                   
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                </div>       
            </div>
        @endforeach
               
                       
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" class="page-btn page-btn-primary" wire:loading.attr="disabled"><span><i class="icon-message-alt-add wrap_i"></i> Submit</span></x-admin.button>
        {{-- <x-admin.button type="submit" class="page-btn page-btn-primary" color="success" wire:loading.attr="disabled"><i class="icon-message-alt-add wrap_i"></i> Add Design</x-admin.button> --}}
        <!-- <x-admin.link :href="route('gallery.index')" color="secondary">Cancel</x-admin.link> -->
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
        jQuery(document).ready(function($) {

        if (window.history && window.history.pushState) {

        window.history.pushState('forward', null);

        $(window).on('popstate', function() {
            alert('Changes that you made may not be saved.');
        });

        }
        });
    </script>
@endpush