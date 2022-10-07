<?php

namespace App\Http\Livewire\Admin\MonthlyExpenses;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\MonthlyExpenses;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class MonthlyExpensesList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];

    protected $paginationTheme = 'bootstrap';

    public  $searchUser,$searchReceiver,$searchChargeName,$searchChargeAmount,$searchYear,$searchAmount,$searchMonth,$searchPaidDate,$searchBill,$searchStatus = -1, $perPage = 5,$search;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchUser = "";
        $this->searchReceiver = "";
        $this->searchChargeAmount = "";
        $this->searchChargeName = "";
        $this->searchPaidDate = "";
        $this->searchYear = "";
        $this->searchMonth = "";
        $this->searchBill = "";
        $this->searchAmount = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $queryData = MonthlyExpenses::query()->with(['user']);
        
        if ($this->searchUser) {
                $queryData->whereHas('user', function($query) {
                    $query->where('first_name',  'like', '%'  . $this->searchUser . '%');
                 })->get();
        }
        
        if ($this->searchReceiver)
            $queryData->Where('receiver_name', 'like', '%' . $this->searchReceiver . '%');

        if ($this->searchYear)
            $queryData->Where('year', 'like', '%' . $this->searchYear . '%');
        if ($this->searchMonth)
            $queryData->Where('month', 'like', '%' . $this->searchMonth . '%');
        if ($this->searchPaidDate)
            $queryData->Where('updated_at', 'like', '%' . $this->searchPaidDate . '%');

        if ($this->searchBill)
            $queryData->Where('bill_no', 'like', '%' . $this->searchBill . '%');
        if ($this->searchAmount)
            $queryData->Where('total_amount', 'like', '%' . $this->searchAmount . '%');
        if ($this->searchChargeName)
            $queryData->Where('charges_name', 'like', '%' . $this->searchChargeName . '%');
        if ($this->searchChargeAmount)
            $queryData->Where('charge_amount', 'like', '%' . $this->searchChargeAmount . '%');

        if ($this->searchStatus >= 0)
            $queryData->orWhere('active', $this->searchStatus);

        return view('livewire.admin.monthly-expenses.monthly-expenses-list', [
            'details' => $queryData
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        MonthlyExpenses::destroy($id);
        $this->showModal('success', 'Success', 'status has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(MonthlyExpenses $details)
    {
        $details->active = ($details->active==1)?0:1;
        $details->update();
        $this->showModal('success', 'Success', 'status has been changed successfully');
    }
}
    
