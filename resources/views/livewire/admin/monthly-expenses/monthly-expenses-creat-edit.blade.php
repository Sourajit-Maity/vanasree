<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">

        <x-admin.form-group>
            <x-admin.lable value="Receiver Name"   />
            <x-admin.input type="text" wire:model.defer="receiver_name" placeholder="Receiver Name"  class="{{ $errors->has('receiver_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="receiver_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Year" required/>
            <x-admin.dropdown  wire:model.defer="year" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('year') ? 'is-invalid' :'' }}">
                    @foreach ($yearList as $year)
                        <x-admin.dropdown-item  :value="$year['value']" :text="$year['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="year" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Month" required/>
            <x-admin.dropdown  wire:model.defer="month" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('month') ? 'is-invalid' :'' }}">
                    @foreach ($monthList as $month)
                        <x-admin.dropdown-item  :value="$month['value']" :text="$month['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="month" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Charge Name"   />
            <x-admin.input type="text" wire:model.defer="charges_name" placeholder="Charge Name"  class="{{ $errors->has('charges_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="charges_name" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Charge Amount"   />
            <x-admin.input type="text" wire:model.defer="charge_amount" placeholder="Charge Amount"  class="{{ $errors->has('charge_amount') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="charge_amount" />
        </x-admin.form-group>



        <x-admin.form-group>
            <x-admin.lable value="Bill No" required />
            <x-admin.input type="text" wire:model.defer="bill_no" placeholder="Bill no" autocomplete="off" class="{{ $errors->has('bill_no') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="bill_no" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Billing Amount" required />
            <x-admin.input type="text" wire:model.defer="total_amount" placeholder="Total Amount" autocomplete="off" class="{{ $errors->has('total_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="total_amount" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Paid Amount" />
            <x-admin.input type="text" wire:model.defer="discount_amount" placeholder="Paid Amount" autocomplete="off" class="{{ $errors->has('discount_amount') ? 'is-invalid' :'' }}"/>
            <x-admin.input-error for="discount_amount" />
        </x-admin.form-group>

        <x-admin.form-group>
            <x-admin.lable value="Payment Type" required/>
            <x-admin.dropdown  wire:model.defer="payment_type" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('payment_type') ? 'is-invalid' :'' }}">
                    @foreach ($paymentType as $type)
                        <x-admin.dropdown-item  :value="$type['value']" :text="$type['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="payment_type" />
        </x-admin.form-group>


        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
            <x-admin.dropdown  wire:model.defer="payment_status" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('payment_status') ? 'is-invalid' :'' }}">
                    @foreach ($statusList as $status)
                        <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>
                    @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="payment_status" />
        </x-admin.form-group>

        
        </div>
        <br/>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('monthly-expenses.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
