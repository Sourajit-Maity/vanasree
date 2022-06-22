<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Image Name" required />
            <x-admin.input type="text" wire:model.defer="design_name" placeholder="Image Name"  class="{{ $errors->has('design_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="design_name" />
        </x-admin.form-group>
       
        <x-admin.form-group>
            <x-admin.lable value="File" required />
            <x-admin.input type="file" wire:model.defer="design_photo_path"   class="{{ $errors->has('design_photo_path') ? 'is-invalid' :'' }}" accept="image/*" />
            <x-admin.input-error for="design_photo_path" />
        </x-admin.form-group>
        @if($isEdit)
        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($gallery->design_photo_path) ? Storage::url($gallery->design_photo_path) : asset($gallery->gallery-image)}}" width="200px" height="150px">
        </div>
        @endif

        <x-admin.form-group class="col-lg-12" >
        <x-admin.lable value="Details" required/>
        <textarea
        wire:model.defer="design_description" id="design_description" class="form-control {{ $errors->has('design_description') ? 'is-invalid' :'' }}"></textarea>
        <x-admin.input-error for="design_description" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
            <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group>
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('gallery.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
