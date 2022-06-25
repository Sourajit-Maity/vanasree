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

        <x-admin.form-group>
                        <x-admin.lable value="Background Image" required />
                        <x-admin.input type="file" wire:model.defer="banner_background_image"   class="{{ $errors->has('banner_background_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="banner_background_image" />
                        <span>Image Size : 1920*665</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->banner_background_image) ? Storage::url($details->home->banner_background_image) : asset($details->home->banner_background_image)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Background Badge Image" required />
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

        <x-admin.form-group>
            <x-admin.lable value="Sub Heading" required />
            <x-admin.input type="text" wire:model.defer="banner_sub_heading" placeholder="Enter Sub Heading"
                class="{{ $errors->has('banner_sub_heading') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="banner_sub_heading" />
        </x-admin.form-group>
       
       
        <!-- content1 page -->
        <x-admin.form-group>
            <x-admin.lable value="Welcome Heading" required />
            <x-admin.input type="text"  wire:model.defer="content1_heading" placeholder="Enter Heading"
                class="{{ $errors->has('content1_heading') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="content1_heading" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content1_image"   class="{{ $errors->has('content1_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content1_image" />
                        <span>Image Size : 453*709</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content1_image) ? Storage::url($details->home->content1_image) : asset($details->home->content1_image)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Welcome Content" required />
                        <x-admin.textarea type="text" wire:model.defer="content1_text" placeholder="content1_text..."  class="{{ $errors->has('content1_text') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="content1_text" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Status" />
                        <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                                @foreach ($statusList as $status)
                                    <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="active" />
                    </x-admin.form-group>
<!-- content2 -->
<x-admin.form-group>
            <x-admin.lable value="Content Heading" required />
            <x-admin.input type="text" wire:model.defer="content2_heading" placeholder="Enter  Heading"
                class="{{ $errors->has('content2_heading') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="content2_heading" />
        </x-admin.form-group>
       
        <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Content" required />
                        <x-admin.textarea type="text" wire:model.defer="content2_text" placeholder="content2_text..."  class="{{ $errors->has('content2_text') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="content2_text" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_image"   class="{{ $errors->has('content2_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_image" />
                        <span>Image Size : 353*537</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_image) ? Storage::url($details->home->content2_image) : asset($details->home->content2_image)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
            <x-admin.lable value="Content Heading" required />
            <x-admin.input type="text" wire:model.defer="content3_heading" placeholder="Enter  Heading"
                class="{{ $errors->has('content3_heading') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="content3_heading" />
        </x-admin.form-group>
       
        <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Content" required />
                        <x-admin.textarea type="text" wire:model.defer="content3_text" placeholder="content text..."  class="{{ $errors->has('content3_text') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="content3_text" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content3_image"   class="{{ $errors->has('content3_image') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content3_image" />
                        <span>Image Size : 353*537</span>
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content3_image) ? Storage::url($details->home->content3_image) : asset($details->home->content3_image)}}" width="200px" height="150px">
        </div>
          <!-- Content 3 -->
       <x-admin.form-group>
            <x-admin.lable value="Content Heading" required />
            <x-admin.input type="text"  wire:model.defer="content2_option_heading1" placeholder="Enter Heading"
                class="{{ $errors->has('content2_option_heading1') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="content2_option_heading1" />
        </x-admin.form-group>
       
        <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Content" required />
                        <x-admin.textarea type="text" wire:model.defer="content2_option_text1" placeholder="content2_option_text1..."  class="{{ $errors->has('content2_option_text1') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="content2_option_text1" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image1"   class="{{ $errors->has('content2_option_image1') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image1" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image1) ? Storage::url($details->home->content2_option_image1) : asset($details->home->content2_option_image1)}}" width="200px" height="150px">
        </div>           
       
<!-- content 4  -->
<x-admin.form-group>
            <x-admin.lable value=" Heading" required />
                <x-admin.input type="text"  wire:model.defer="content2_option_heading2" placeholder="Enter Heading"
                    class="{{ $errors->has('content2_option_heading2') ? 'is-invalid' :'' }}"/>
                <x-admin.input-error for="content2_option_heading2" />
        </x-admin.form-group>
       
        <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Content" required />
                        <x-admin.textarea type="text" wire:model.defer="content2_option_text2" placeholder="content2_option_text2..."  class="{{ $errors->has('content2_option_text2') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="content2_option_text2" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image2"   class="{{ $errors->has('content2_option_image2') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image2" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image2) ? Storage::url($details->home->content2_option_image2) : asset($details->home->content2_option_image2)}}" width="200px" height="150px">
        </div> 
        
        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image3"   class="{{ $errors->has('content2_option_image3') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image3" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image3) ? Storage::url($details->home->content2_option_image3) : asset($details->home->content2_option_image3)}}" width="200px" height="150px">
        </div>


        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image22"   class="{{ $errors->has('content2_option_image22') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image22" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image22) ? Storage::url($details->home->content2_option_image22) : asset($details->home->content2_option_image22)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image4"   class="{{ $errors->has('content2_option_image4') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image4" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image4) ? Storage::url($details->home->content2_option_image4) : asset($details->home->content2_option_image4)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image5"   class="{{ $errors->has('content2_option_image5') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image5" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image5) ? Storage::url($details->home->content2_option_image5) : asset($details->home->content2_option_image5)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image6"   class="{{ $errors->has('content2_option_image6') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image6" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image6) ? Storage::url($details->home->content2_option_image6) : asset($details->home->content2_option_image6)}}" width="200px" height="150px">
        </div>

        <x-admin.form-group>
                        <x-admin.lable value="Image" required />
                        <x-admin.input type="file" wire:model.defer="content2_option_image7"   class="{{ $errors->has('content2_option_image7') ? 'is-invalid' :'' }}" accept="image/*" />
                        <x-admin.input-error for="content2_option_image7" />
        </x-admin.form-group>

        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($details->home->content2_option_image7) ? Storage::url($details->home->content2_option_image7) : asset($details->home->content2_option_image7)}}" width="200px" height="150px">
        </div>
    
            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('pages.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
