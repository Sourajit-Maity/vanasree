<?php

namespace App\Http\Livewire\Admin\MonthlyExpenses;

use Livewire\Component;
use App\Models\User;
use App\Models\MonthlyExpenses;

class MonthlyExpensesDetails extends Component
{
    public $monthlyexpense;

    public function mount($monthlyexpense = null)
    {
       $this->monthlyexpense = $monthlyexpense;
    }
    public function render()
    {
        $details = MonthlyExpenses::where('id',$this->monthlyexpense)->with('user')->first();
        return view('livewire.admin.monthly-expenses.monthly-expenses-details',['details'=>$details]);
    }
}
   