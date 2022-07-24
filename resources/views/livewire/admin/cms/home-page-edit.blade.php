<x-admin.form-section submit="saveOrUpdate">

    <x-slot name="form">
    <div class="form-group col-lg-12">
          
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-layer"></i>
            </span>
                    <h3 class="kt-portlet__head-title">
                        Home page
                    </h3>
                </div>
            </div>
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Logo" required />
                        <x-admin.input type="file" wire:model.defer="logo"   class="{{ $errors->has('logo') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="logo" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->logo) ? Storage::url($details->home->logo) : asset($details->home->logo)}}" width="200px" height="150px">
        </div>
        <hr style="border-top: 3px solid #128ac0 !important;">
        <x-admin.form-group>
                        <x-admin.lable value="Banner Main Image" required />
                        <x-admin.input type="file" wire:model.defer="banner_main_image"   class="{{ $errors->has('banner_main_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="banner_main_image" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->banner_main_image) ? Storage::url($details->home->banner_main_image) : asset($details->home->banner_main_image)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="Main Banner Heading" required/>
                    <br>
                    <a href="https://www.toptal.com/designers/htmlarrows/symbols/">Copy link for Bullets</a>        

                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('main_banner_heading');
                    editor.on('change', function(event){
                        @this.set('main_banner_heading', event.editor.getData());
                    })" wire:model.defer="main_banner_heading" id="main_banner_heading" class="form-control {{ $errors->has('main_banner_heading') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>

        <x-admin.form-group>
                        <x-admin.lable value="Header Image One" required />
                        <x-admin.input type="file" wire:model.defer="banner_background_image"   class="{{ $errors->has('banner_background_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="banner_background_image" />
                        <span>Image Size : 1920*665</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->banner_background_image) ? Storage::url($details->home->banner_background_image) : asset($details->home->banner_background_image)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Header Image Two" required />
                        <x-admin.input type="file" wire:model.defer="banner_badge_image"   class="{{ $errors->has('banner_badge_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="banner_badge_image" />
                        <span>Image Size : 431*366</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->banner_badge_image) ? Storage::url($details->home->banner_badge_image) : asset($details->home->banner_badge_image)}}" width="200px" height="150px">
        </div>

        

        <x-admin.form-group>
            <x-admin.lable value="Heading" required />
            <x-admin.input type="text"  wire:model.defer="banner_heading" placeholder="Enter Heading"
                class="{{ $errors->has('banner_heading') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="banner_heading" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="Sub Heading" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('banner_sub_heading');
                    editor.on('change', function(event){
                        @this.set('banner_sub_heading', event.editor.getData());
                    })" wire:model.defer="banner_sub_heading" id="banner_sub_heading" class="form-control {{ $errors->has('banner_sub_heading') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>

       
        <hr style="border-top: 3px solid #128ac0 !important;">  
        <!-- content1 page -->
        <x-admin.form-group>
            <x-admin.lable value="About Heading One" required />
            <x-admin.input type="text"  wire:model.defer="content1_heading" placeholder="Enter Heading"
                class="{{ $errors->has('content1_heading') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="content1_heading" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="About Content One" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('content1_text');
                    editor.on('change', function(event){
                        @this.set('content1_text', event.editor.getData());
                    })" wire:model.defer="content1_text" id="content1_text" class="form-control {{ $errors->has('content1_text') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Content One Image" required />
                        <x-admin.input type="file" wire:model.defer="content1_image"   class="{{ $errors->has('content1_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content1_image" />
                        <span>Image Size : 453*709</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content1_image) ? Storage::url($details->home->content1_image) : asset($details->home->content1_image)}}" width="200px" height="150px">
        </div>

        <hr style="border-top: 3px solid #128ac0 !important;">  

<!-- content2 -->
        <x-admin.form-group>
            <x-admin.lable value="About Heading Two" required />
            <x-admin.input type="text" wire:model.defer="content2_heading" placeholder="Enter  Heading"
                class="{{ $errors->has('content2_heading') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="content2_heading" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="About Content Two" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('content2_text');
                    editor.on('change', function(event){
                        @this.set('content2_text', event.editor.getData());
                    })" wire:model.defer="content2_text" id="content2_text" class="form-control {{ $errors->has('content2_text') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Content Two Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_image"   class="{{ $errors->has('content2_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_image" />
                        <span>Image Size : 353*537</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_image) ? Storage::url($details->home->content2_image) : asset($details->home->content2_image)}}" width="200px" height="150px">
        </div>

        <hr style="border-top: 3px solid #128ac0 !important;">  


        <x-admin.form-group>
            <x-admin.lable value="About Heading Three" required />
            <x-admin.input type="text" wire:model.defer="content3_heading" placeholder="Enter  Heading"
                class="{{ $errors->has('content3_heading') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="content3_heading" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="About Content Three" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('content3_text');
                    editor.on('change', function(event){
                        @this.set('content3_text', event.editor.getData());
                    })" wire:model.defer="content3_text" id="content3_text" class="form-control {{ $errors->has('content3_text') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>

        <x-admin.form-group>
                        <x-admin.lable value="Content Three Image" required />
                        <x-admin.input type="file" wire:model.defer="content3_image"   class="{{ $errors->has('content3_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content3_image" />
                        <span>Image Size : 353*537</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content3_image) ? Storage::url($details->home->content3_image) : asset($details->home->content3_image)}}" width="200px" height="150px">
        </div>

        <hr style="border-top: 3px solid #128ac0 !important;">  
          <!-- Content 3 -->
       <x-admin.form-group>
            <x-admin.lable value="History Heading" required />
            <x-admin.input type="text"  wire:model.defer="content2_option_heading1" placeholder="Enter Heading"
                class="{{ $errors->has('content2_option_heading1') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="content2_option_heading1" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="History Content" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('content2_option_text1');
                    editor.on('change', function(event){
                        @this.set('content2_option_text1', event.editor.getData());
                    })" wire:model.defer="content2_option_text1" id="content2_option_text1" class="form-control {{ $errors->has('content2_option_text1') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>
      
        <x-admin.form-group>
                        <x-admin.lable value="Background Setup Image" required />
                        <x-admin.input type="file" wire:model.defer="banner_setup_image"   class="{{ $errors->has('banner_setup_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="banner_setup_image" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->banner_setup_image) ? Storage::url($details->home->banner_setup_image) : asset($details->home->banner_setup_image)}}" width="200px" height="150px">
        </div>  

        <x-admin.form-group>
                        <x-admin.lable value="Setup Image" required />
                        <x-admin.input type="file" wire:model.defer="setup_image"   class="{{ $errors->has('setup_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="setup_image" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->setup_image) ? Storage::url($details->home->setup_image) : asset($details->home->setup_image)}}" width="200px" height="150px">
        </div>     

                  
        <hr style="border-top: 3px solid #128ac0 !important;"> 
<!-- content 4  -->
        <x-admin.form-group>
            <x-admin.lable value="History Below Heading" required />
                <x-admin.input type="text"  wire:model.defer="content2_option_heading2" placeholder="Enter Heading"
                    class="{{ $errors->has('content2_option_heading2') ? 'is-invalid' :'' }}"/>
                <x-admin.input-error for="content2_option_heading2" />
        </x-admin.form-group>
        <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="History Below Content" required/>
                    <textarea
                    x-data x-init="editor = CKEDITOR.replace('content2_option_text2');
                    editor.on('change', function(event){
                        @this.set('content2_option_text2', event.editor.getData());
                    })" wire:model.defer="content2_option_text2" id="content2_option_text2" class="form-control {{ $errors->has('content2_option_text2') ? 'is-invalid' :'' }}"></textarea>
        </x-admin.form-group>
        <x-admin.form-group>
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Setup Below Image One" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image1"   class="{{ $errors->has('content2_option_image1') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image1" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image1) ? Storage::url($details->home->content2_option_image1) : asset($details->home->content2_option_image1)}}" width="200px" height="150px">
        </div>
        <x-admin.form-group>
                        <x-admin.lable value="Setup Below Image Two" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image2"   class="{{ $errors->has('content2_option_image2') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image2" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image2) ? Storage::url($details->home->content2_option_image2) : asset($details->home->content2_option_image2)}}" width="200px" height="150px">
        </div> 

        <hr style="border-top: 3px solid #128ac0 !important;"> 

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image One" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image22"   class="{{ $errors->has('content2_option_image22') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image22" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image22) ? Storage::url($details->home->content2_option_image22) : asset($details->home->content2_option_image22)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Two" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image3"   class="{{ $errors->has('content2_option_image3') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image3" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image3) ? Storage::url($details->home->content2_option_image3) : asset($details->home->content2_option_image3)}}" width="200px" height="150px">
        </div>


        

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Three" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image4"   class="{{ $errors->has('content2_option_image4') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image4" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image4) ? Storage::url($details->home->content2_option_image4) : asset($details->home->content2_option_image4)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Four" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image5"   class="{{ $errors->has('content2_option_image5') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image5" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image5) ? Storage::url($details->home->content2_option_image5) : asset($details->home->content2_option_image5)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Five" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image6"   class="{{ $errors->has('content2_option_image6') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image6" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image6) ? Storage::url($details->home->content2_option_image6) : asset($details->home->content2_option_image6)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Six" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image7"   class="{{ $errors->has('content2_option_image7') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image7" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image7) ? Storage::url($details->home->content2_option_image7) : asset($details->home->content2_option_image7)}}" width="200px" height="150px">
        </div>

        //

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Seven" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image8"   class="{{ $errors->has('content2_option_image8') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image8" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image8) ? Storage::url($details->home->content2_option_image8) : asset($details->home->content2_option_image8)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Eight" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image9"   class="{{ $errors->has('content2_option_image9') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image9" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image9) ? Storage::url($details->home->content2_option_image9) : asset($details->home->content2_option_image9)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Gallery Image Nine" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image10"   class="{{ $errors->has('content2_option_image10') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image10" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image10) ? Storage::url($details->home->content2_option_image10) : asset($details->home->content2_option_image10)}}" width="200px" height="150px">
        </div>
        
            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('pages.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
