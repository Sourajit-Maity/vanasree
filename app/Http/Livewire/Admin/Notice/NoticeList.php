<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Notice;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
class NoticeList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchNumber,$searchUser, $searchStatus = -1, $perPage = 5;
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
        $this->searchName = "";
        $this->searchNumber = "";
        $this->searchUser = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $userQuery = Notice::query()->with('user');
        if ($this->searchName)
            $userQuery->orWhere('notice_name', 'like', '%' . $this->searchUserName . '%');            
        if ($this->searchUser) {
                $user_name = User::Where('first_name', 'like', '%' . $this->searchUser . '%')->get();
                foreach ($user_name as $value) {
                    $userQuery->orWhere('user_id', $value->id);
                 }
             } 
        if ($this->searchNumber)
            $userQuery->orWhere('notice_number', 'like', '%' . $this->searchNumber . '%');
        if ($this->searchStatus >= 0)
            $userQuery->orWhere('active', $this->searchStatus);
        return view('livewire.admin.notice.notice-list', [
            'datas' => $userQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Notice::destroy($id);
        $this->showModal('success', 'Success', 'Notice has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Notice!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Notice $user)
    {
        $user->fill(['active' => ($user->active == 1) ? 0 : 1])->save();
       
        $this->showModal('success', 'Success', 'Notice status has been changed successfully');
    }
}

