<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Mom Number" required />
            <x-admin.input type="text" wire:model.defer="mom_number" placeholder="Mom Number"  class="{{ $errors->has('mom_number') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mom_number" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Mom Head"  required />
            <x-admin.input type="text" wire:model.defer="mom_name" placeholder="Mom Head"  class="{{ $errors->has('mom_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mom_name" />
        </x-admin.form-group>
       
        <x-admin.form-group>
            <x-admin.lable value="File" required />
            <x-admin.input type="file" wire:model.defer="mom_photo_path"   class="{{ $errors->has('mom_photo_path') ? 'is-invalid' :'' }}" accept="image/*" />
            <x-admin.input-error for="mom_photo_path" />
        </x-admin.form-group>
        @if($isEdit)
        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($mom->mom_photo_path) ? Storage::url($mom->mom_photo_path) : asset($mom->mom_image)}}" width="200px" height="150px">
        </div>
        @endif

        <x-admin.form-group class="col-lg-12" >
        <x-admin.lable value="Details" required/>
        <textarea
        wire:model.defer="mom_description" id="mom_description" class="form-control {{ $errors->has('mom_description') ? 'is-invalid' :'' }}"></textarea>
        <x-admin.input-error for="mom_description" />
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
        <x-admin.link :href="route('moms.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
