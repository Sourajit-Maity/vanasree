<?php

namespace App\Http\Livewire\Admin\Contact;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\ContactUsForm;

class ContactList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchFullname,$searchEmail,$searchAddress,$searchState, $searchPhone,$searchSubject,$searchMessage,$searchCity, $searchStatus = -1, $perPage = 5;
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
        $this->searchFullname = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
        $this->searchAddress = "";
        $this->searchSubject = "";
        $this->searchMessage = "";
        $this->searchCity = "";
        $this->searchState = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $contactformQuery = ContactUsForm::query();
        if ($this->searchFullname)
            $contactformQuery->Where('full_name', 'like', '%' . $this->searchFullname . '%');
        if ($this->searchEmail)
            $contactformQuery->Where('email', 'like', '%' . $this->searchEmail . '%');
        if ($this->searchPhone)
            $contactformQuery->Where('phone', 'like', '%' . $this->searchPhone . '%');
        if ($this->searchAddress)
            $contactformQuery->Where('address', 'like', '%' . $this->searchAddress . '%');
        if ($this->searchSubject)
            $contactformQuery->Where('subject', 'like', '%' . $this->searchSubject . '%');
        if ($this->searchMessage)
            $contactformQuery->Where('message', 'like', '%' . $this->searchMessage . '%');
        if ($this->searchCity)
            $contactformQuery->Where('city', 'like', '%' . $this->searchCity . '%');
        if ($this->searchState)
            $contactformQuery->Where('state', 'like', '%' . $this->searchState . '%');
        if ($this->searchStatus >= 0)
            $contactformQuery->orWhere('active', $this->searchStatus);
        return view('livewire.admin.contact.contact-list', [
            'contactusforms' => $contactformQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        ContactUsForm::destroy($id);
        $this->showModal('success', 'Success', 'Contact Message is deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to delete this?", 'Yes, Delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(ContactUsForm $contact)
    {
        $contact->fill(['active' => ($contact->active == 1) ? 0 : 1])->save();
       
        $this->showModal('success', 'Success', 'status is changed successfully');
    }
}

