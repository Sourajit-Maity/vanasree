<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class UserCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $first_name, $last_name, $email,$nick_name,$username, $password, $phone, $active, $password_confirmation,$flat_number,$tower_number, $user, $model_id;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $photo;
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($user = null)
    {
        if ($user) {
            $this->user = $user;
            $this->fill($this->user);
            $this->isEdit = true;
        } else
            $this->user = new User;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->model_image = Media::where(['model_id' => $this->user->id, 'collection_name' => 'images'])->first();
        if (!$this->model_image == null) {
            $this->imgId = $this->model_image->id;
        }
        $this->model_documents = Media::where(['model_id' => $this->user->id, 'collection_name' => 'documents'])->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'first_name' => ['required', 'max:255'],
                'last_name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')],
                'phone' => ['required', Rule::unique('users')],
                // 'password' => ['required', 'max:255', 'min:6', 'confirmed'],
                // 'password_confirmation' => ['required', 'max:255', 'min:6'],
                'active' => ['required'],
                'photo' => ['nullable'],
                'tower_number' => ['required'],
                'flat_number' => ['required'],
                'address' => ['nullable'],

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'first_name' => ['required', 'max:255'],
                'last_name' => ['required', 'max:255'],
                'active' => ['required'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
                'phone' => ['required', Rule::unique('users')->ignore($this->user->id)],
                'address' => ['nullable'],
                'tower_number' => ['required'],
                'flat_number' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->nick_name = $this->tower_number.$this->flat_number.$this->last_name;
        $this->password = 123456;

        $this->isEdit ? $this->user->nick_name = $this->nick_name : $this->user->nick_name = $this->nick_name;

        $this->user->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        if ($this->photo) {
            if ($this->imgId) {
                $item = Media::find($this->imgId);
                $item->delete(); // delete previous image in the database

                $this->user->addMedia($this->photo->getRealPath())
                    ->usingName($this->photo->getClientOriginalName())
                    ->toMediaCollection('images');
            } else {
                $this->user->addMedia($this->photo->getRealPath())
                    ->usingName($this->photo->getClientOriginalName())
                    ->toMediaCollection('images');
            }
        }
        if ($this->photos) {
            foreach ($this->photos as $photo) {
                $this->user->addMedia($photo->getRealPath())
                    ->usingName($photo->getClientOriginalName())
                    ->toMediaCollection('documents');
            }
        }
        if (!$this->isEdit)
            $this->user->assignRole('USER');
        //send successfully register mail
        $myEmail = $this->user->email;
        //dd($myEmail);
        if (!$this->isEdit){
            $details = [
                'name' =>  $this->user->first_name.$this->user->last_name,
                'mail_title' => 'Registered email succesfully',
                'mail_subject' => 'Registered email succesfully',               
                'mail_body' => 'Hi',
                'nick_name' => $this->nick_name,
                'password' =>  $this->password,
            ];
        }
        if ($this->isEdit){
           
            $details = [
                'name' =>  $this->user->first_name.$this->user->last_name,
                'mail_title' => 'Profile Updated succesfully',
                'mail_subject' => 'Profile Updated succesfully',               
                'mail_body' => 'Hi',
                'nick_name' => $this->nick_name,
                'password' =>  'If you want to change your password please go to this link - https://vanashricbechs.com/forget-password',
            ];
        }
      
        Mail::to($myEmail)->send(new RegisterMail($details));
        $msgAction = 'User has been ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('users.index');
    }
    public function deletedocuments($id)
    {
        $item = Media::find($id);
        $item->delete(); // delete previous image in the database
        $this->showModal('success', 'Success', 'Document deleted successfully');
        $this->emit('refreshProducts');
    }
    public function render()
    {
        return view('livewire.admin.user-create-edit');
    }
}
