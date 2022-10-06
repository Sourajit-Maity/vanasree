<?php

namespace App\Http\Livewire\Admin\MonthlyCharge;

use Livewire\Component;
use App\Models\User;
use App\Models\MonthlyCharges;
class MonthlyChargeDetails extends Component
{
    public $monthlycharge;

    public function mount($monthlycharge = null)
    {
       $this->monthlycharge = $monthlycharge;
    }
    public function render()
    {
        $details = MonthlyCharges::where('id',$this->monthlycharge)->with('user','receiver')->first();
        return view('livewire.admin.monthly-charge.monthly-charge-details',['details'=>$details]);
    }
}
   