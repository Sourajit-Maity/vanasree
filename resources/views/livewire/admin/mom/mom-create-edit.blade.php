<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Minutes of the Meeting Number" required />
            <x-admin.input type="text" wire:model="mom_number" placeholder="Minutes of the Meeting Number"  class="{{ $errors->has('mom_number') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mom_number" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Minutes of the Meeting Head"  required />
            <x-admin.input type="text" wire:model="mom_name" placeholder="Mom Head"  class="{{ $errors->has('mom_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mom_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Minutes of the Meeting Date" required />
            <x-admin.input type="date" name="mom_date" id="mom_date" placeholder="Minutes of the Meeting Date" autocomplete="off"   class="{{ $errors->has('mom_date') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="mom_date" />           
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="File" required />
            <x-admin.input type="file" wire:model="mom_photo_path"   class="{{ $errors->has('mom_photo_path') ? 'is-invalid' :'' }}" accept="pdf/*" />
            <x-admin.input-error for="mom_photo_path" />
        </x-admin.form-group>
        <!-- @if($isEdit)
        <div class="form-group col-lg-3 d-flex justify-content-end">
            <img src="{{Storage::disk('public')->exists($mom->mom_photo_path) ? Storage::url($mom->mom_photo_path) : asset($mom->mom_image)}}" width="200px" height="150px">
        </div>
        @endif -->

       
        <x-admin.form-group class="col-lg-12">
            <x-admin.lable value="Description" required />
            <x-admin.textarea type="text" wire:model.defer="mom_description" placeholder="Description..."  class="{{ $errors->has('mom_description') ? 'is-invalid' :'' }}" rows='4' />
            <x-admin.input-error for="mom_description" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
            <x-admin.dropdown  wire:model="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
  
    $('#mom_date').on('change', function(e) {
      console.log(e.target.value)
      @this.set('mom_date', e.target.value);
    });

    
});
</script>
