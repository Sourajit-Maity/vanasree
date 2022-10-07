<?php

namespace App\Http\Livewire\Admin\MonthlyExpenses;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\MonthlyExpenses;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class MonthlyExpensesCreatEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $monthlyexpense,$bill_no,$payment_type, $user_id, $charges_name,  $blankArr, $active;
    public  $bill_post_date,$receiver_name,$charge_amount,$bill_payment_date,$discount_amount,  $total_amount, $payment_status;
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

    public function mount($monthlyexpense = null)
    {
        if ($monthlyexpense) {
            $this->monthlyexpense = $monthlyexpense;
            $this->fill($this->monthlyexpense);
            $this->isEdit = true;
        } else
            $this->monthlyexpense = new MonthlyExpenses;

       
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
                'charges_name' => ['required'],
                'receiver_name' => ['required'],
                'charge_amount' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
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
                'charges_name' => ['required'],
                'receiver_name' => ['required'],
                'charge_amount' => ['nullable', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
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
        !$this->isEdit ? $this->monthlyexpense->bill_post_date = Carbon::now() : '';
        $this->isEdit ? $this->monthlyexpense->bill_payment_date = Carbon::now() : '';
        $this->isEdit ? $this->monthlyexpense->user_id = auth()->user()->id : $this->monthlyexpense->user_id = auth()->user()->id;
        $this->monthlyexpense->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        if (!$this->isEdit){
            $msgAction = 'Bill has been added successfully';
            $this->showToastr("success", $msgAction);
        }
            

        return redirect()->route('monthly-expenses.index');
    }

    public function render()
    {
        return view('livewire.admin.monthly-expenses.monthly-expenses-creat-edit');
    }
}
