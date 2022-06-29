<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Circular/Notice Number" required />
            <x-admin.input type="text" wire:model.defer="notice_number" placeholder="Circular/Notice Number"  class="{{ $errors->has('notice_number') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="notice_number" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Circular/Notice Head"  required />
            <x-admin.input type="text" wire:model.defer="notice_name" placeholder="Circular/Notice Head"  class="{{ $errors->has('notice_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="notice_name" />
        </x-admin.form-group>
      
        <x-admin.form-group>
            <x-admin.lable value="Circular/Notice Date" required />
            <x-admin.input type="date" name="notice_date" id="notice_date" placeholder="Circular/Notice Date" autocomplete="off"   class="{{ $errors->has('notice_date') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="notice_date" />           
        </x-admin.form-group>
        
        <x-admin.form-group>
            <x-admin.lable value="File" required />
            <x-admin.input type="file" wire:model.defer="notice_photo_path"   class="{{ $errors->has('notice_photo_path') ? 'is-invalid' :'' }}" accept="pdf/*" />
            <x-admin.input-error for="notice_photo_path" />
        </x-admin.form-group>
        <!-- @if($isEdit)
        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($notice->notice_photo_path) ? Storage::url($notice->notice_photo_path) : asset($notice->notice_image)}}" width="200px" height="150px">
        </div>
        @endif -->
        <x-admin.form-group class="col-lg-12">
            <x-admin.lable value="Description" required />
            <x-admin.textarea type="text" wire:model.defer="notice_description" placeholder="Description..."  class="{{ $errors->has('notice_description') ? 'is-invalid' :'' }}" rows='4' />
            <x-admin.input-error for="notice_description" />        </x-admin.form-group>
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
        <x-admin.link :href="route('notice.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
  
    $('#notice_date').on('change', function(e) {
      console.log(e.target.value)
      @this.set('notice_date', e.target.value);
    });

    
});
</script>