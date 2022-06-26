<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Full name" required />
                        <x-admin.input type="text" wire:model.defer="full_name" placeholder="full name" readonly class="{{ $errors->has('full_name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="full_name" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Email" required />
                        <x-admin.input type="text" wire:model.defer="email" placeholder="email" readonly class="{{ $errors->has('email') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="email" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Phone" required />
                        <x-admin.input type="text" wire:model.defer="phone" placeholder="phone" readonly class="{{ $errors->has('phone') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="phone" />
                    </x-admin.form-group>
<!-- 
                    <x-admin.form-group>
                        <x-admin.lable value="Address" required />
                        <x-admin.input type="text" wire:model.defer="address" placeholder="address" readonly class="{{ $errors->has('address') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="address" />
                    </x-admin.form-group> -->

                    <!-- <x-admin.form-group>
                        <x-admin.lable value="State" required />
                        <x-admin.input type="text" wire:model.defer="state" placeholder="state" readonly  class="{{ $errors->has('state') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="state" />
                    </x-admin.form-group>
                    <x-admin.form-group>
                        <x-admin.lable value="City" required />
                        <x-admin.input type="text" wire:model.defer="city" placeholder="city" readonly class="{{ $errors->has('city') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="city" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Zip" required />
                        <x-admin.input type="text" wire:model.defer="zip" placeholder="zip" readonly class="{{ $errors->has('zip') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="zip" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Subject" required />
                        <x-admin.input type="text" wire:model.defer="subject" placeholder="subject" readonly class="{{ $errors->has('subject') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="subject" />
                    </x-admin.form-group> -->

                    
                    <x-admin.form-group class="col-lg-12" wire:ignore>
                    <x-admin.lable value="Message" required />
                    <textarea readonly
                    x-data x-init="editor = CKEDITOR.replace('message');
                    editor.on('change', function(event){
                        @this.set('message', event.editor.getData());
                    })" wire:model.defer="message" id="message" class="form-control {{ $errors->has('message') ? 'is-invalid' :'' }}"></textarea>
                    </x-admin.form-group>
                </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <!-- <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button> -->
        <x-admin.link :href="route('contact-form.index')" color="secondary">Back</x-admin.link>
    </x-slot>
</x-form-section>