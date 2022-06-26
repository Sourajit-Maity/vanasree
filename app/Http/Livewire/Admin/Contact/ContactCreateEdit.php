<?php

namespace App\Http\Livewire\Admin\Contact;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\ContactUsForm; 

class ContactCreateEdit extends Component
{
    use AlertMessage;
    public $full_name,$email,$zip,$subject,$message, $phone,$address,$city, $state,$contact;
    public $isEdit=false;

    public function mount($contact = null)
    {
        if ($contact) {
            $this->contact = $contact;
            $this->fill($this->contact);
            $this->isEdit=true;
        }
        else
            $this->contact=new ContactUsForm;

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'full_name' => ['required'],
                'email' => ['required'],
                'phone' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'zip' => ['required'],
                'subject' => ['required'],
                'message' => ['required'],

                
            ];
    }

    public function validationRuleForUpdate(): array
    {
        return
            [   
                'full_name' => ['required'],
                'email' => ['required'],
                'phone' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'zip' => ['required'],
                'subject' => ['required'],
                'message' => ['required'],
                
            ];
    }

    public function saveOrUpdate()
    {
        $this->contact->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'contactusform is'. ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('contact-form.index');
    }
    public function render()
    {
        return view('livewire.admin.contact.contact-create-edit');
    }
}
