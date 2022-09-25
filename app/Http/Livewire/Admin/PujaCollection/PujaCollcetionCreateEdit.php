<?php

namespace App\Http\Livewire\Admin\PujaCollection;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\PujaCollection;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class PujaCollcetionCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $pujacollcetion, $user_id, $additional_instructions,  $blankArr, $employee_required, $skills, $active;
    public  $bill_post_date,$bill_payment_date, $promo_code, $discount_amount, $reward_discount_amount, $total_amount, $payment_status;
    public $year, $month;
    public $address;
    public $isEdit = false;
    public $userList = [];
    public $paymentList = [];
    public $statusList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($pujacollcetion = null)
    {
        if ($pujacollcetion) {
            $this->pujacollcetion = $pujacollcetion;
            $this->fill($this->pujacollcetion);
            $this->isEdit = true;
        } else
            $this->pujacollcetion = new PujaCollection;

       
        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
       

        $this->paymentList = [
            ['value' => 1, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Due"],
            ['value' => 2, 'text' => "Paid"],
            ['value' => 3, 'text' => "Not Given"]
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
                'active' => ['required'],
                'user_id' => ['nullable'],
                'additional_instructions' => ['nullable'],
                'year' => ['required'],
                'month' => ['required'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'payment_status' => ['required'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'active' => ['required'],
                'user_id' => ['nullable'],
                'additional_instructions' => ['nullable'],
                'year' => ['required'],
                'promo_code' => ['required'],
                'discount_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'total_amount' => ['required', 'regex:/^([0-9\s+\(\)]*)$/', 'min:1', 'max:50'],
                'month' => ['required'],
                'payment_status' => ['required'],
            ];
    }



    public function saveOrUpdate()
    {
        !$this->isEdit ? $this->pujacollcetion->bill_post_date = Carbon::now() : '';
        $this->isEdit ? $this->pujacollcetion->bill_payment_date = Carbon::now() : '';
        $this->pujacollcetion->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();

        if (!$this->isEdit){
            $msgAction = 'Bill has been added successfully';
            $this->showToastr("success", $msgAction);
        }
            

        return redirect()->route('puja-collection.index');
    }

    public function render()
    {
        return view('livewire.admin.puja-collection.puja-collcetion-create-edit');
    }
}
