<?php

namespace App\Http\Livewire\Admin\MonthlyCharge;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\MonthlyCharges;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class MonthlyChargeCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $monthlycharge,$bill_no,$payment_type, $user_id, $service_charge,  $blankArr, $security_charge, $electricity_charge, $active;
    public  $bill_post_date,$received_by_id,$other_expenses_charge,$bill_payment_date, $water_charge, $discount_amount, $maintainence_charge, $total_amount, $payment_status;
    public $year, $month;
    public $address;
    public $isEdit = false;
    public $userList = [];
    public $paymentList = [];
    public $paymentType = [];
    public $monthList = [];
    public $yearList = [];
    public $statusList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($monthlycharge = null)
    {
        if ($monthlycharge) {
            $this->monthlycharge = $monthlycharge;
            $this->fill($this->monthlycharge);
            $this->isEdit = true;
        } else
            $this->monthlycharge = new MonthlyCharges;

       
        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Due"],
            ['value' => 0, 'text' => "Paid"]
        ];
       

        $this->paymentList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Due"],
            ['value' => 2, 'text' => "Paid"],
        ];
        $this->monthList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => "January", 'text' => "January"],
            ['value' => "February", 'text' => "February"],
            ['value' => "March", 'text' => "March"],
            ['value' => "April", 'text' => "April"],
            ['value' => "May", 'text' => "May"],
            ['value' => "June", 'text' => "June"],
            ['value' => "July", 'text' => "July"],
            ['value' => "August", 'text' => "August"],
            ['value' => "September", 'text' => "September"],
            ['value' => "October", 'text' => "October"],
            ['value' => "November", 'text' => "November"],
            ['value' => "December", 'text' => "December"],
        ];
        $this->yearList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 2022, 'text' => "2022"],
            ['value' => 2023, 'text' => "2023"],
            ['value' => 2024, 'text' => "2024"]
        ];
        $this->paymentType = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Cash"],
            ['value' => 2, 'text' => "Cheque"],
            ['value' => 3, 'text' => "Online"]
        ];
        
        $this->blankArr = [
            "value" => "", "text" => "== Select One =="
        ];

        $this->userList = User::role('USER')->get();

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'user_id' => ['required'],
                'service_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'security_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'electricity_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'water_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'maintainence_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'other_expenses_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'bill_no' => ['required'],
                'year' => ['required'],
                'month' => ['required'],
                'discount_amount' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'payment_status' => ['required'],
                'payment_type' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'user_id' => ['required'],
                'service_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'security_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'electricity_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'water_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'maintainence_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'other_expenses_charge' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'year' => ['required'],
                'bill_no' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'month' => ['required'],
                'payment_status' => ['required'],
                'payment_type' => ['required'],
            ];
    }



    public function saveOrUpdate()
    {
        !$this->isEdit ? $this->monthlycharge->bill_post_date = Carbon::now() : '';
        $this->isEdit ? $this->monthlycharge->bill_payment_date = Carbon::now() : '';
        $this->isEdit ? $this->monthlycharge->received_by_id = auth()->user()->id : $this->monthlycharge->received_by_id = auth()->user()->id;
        $this->monthlycharge->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        if (!$this->isEdit){
            $msgAction = 'Bill has been added successfully';
            $this->showToastr("success", $msgAction);
        }
            

        return redirect()->route('monthly-charge.index');
    }
    public function render()
    {
        return view('livewire.admin.monthly-charge.monthly-charge-create-edit');
    }
}
