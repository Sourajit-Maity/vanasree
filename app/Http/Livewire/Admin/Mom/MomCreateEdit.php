<?php

namespace App\Http\Livewire\Admin\Mom;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Mom;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeMail;
use App\Models\User;
class MomCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $mom_number,$active, $mom,$mom_photo_path,$user_id;
    public $mom_name, $mom_description,$mom_time, $mom_date, $blankArr;
    public $isEdit = false;
    public $statusList = [];
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($mom = null)
    {
        if ($mom) {
            $this->mom = $mom;
            $this->fill($this->mom);
            $this->isEdit = true;
        }
         else
        $this->mom = new Mom;
        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        
    }


    public function saveOrUpdate(Request $request)
    {

        $validatedData = $this->validate(
            [
                'mom_number' => ['required', 'max:255'],
                'mom_photo_path' => ['required'],
                'mom_name' => ['required'],
                'mom_date' => ['required', 'date'],
                'mom_description' => ['required'],
                'active' => ['required'],
            ]);
           
        
       
        if(!$this->isEdit){
            $validatedData['mom_photo_path'] = $this->mom_photo_path->store('files', 'public'); 
        }
        if($this->isEdit){
            if($validatedData['mom_photo_path'] == $this->mom->mom_photo_path){
                
                $validatedData['mom_photo_path'] = $this->mom->mom_photo_path;
            }
           else{
                $validatedData['mom_photo_path'] = $this->mom_photo_path->store('files', 'public');
            }
        }
        
        $validatedData['user_id'] = auth()->user()->id;

        if(!$this->isEdit)
        $this->mom = Mom::create($validatedData);
        if($this->isEdit)
        $this->mom->update($validatedData);

        //send successfully register mail
        $users = User::where('active', 1)->get();
        foreach($users as $user){
            $myEmail = $user->email;
            //dd($myEmail);
            $details = [
                'name' =>  $user->first_name.$user->last_name,
                'mail_title' => 'Minutes Of Meeting',
                'mail_subject' => 'Minutes Of Meeting',  
                'mail_body' => 'Please check the Minutes Of Meeting',              
                'notice_number' => $this->mom->mom_number,
                'notice_name' => $this->mom->mom_name,
                'notice_date' => $this->mom->mom_date,
                'notice_description' => $this->mom->mom_description,
            ];
            Mail::to($myEmail)->send(new NoticeMail($details));
        }
     
        $msgAction = 'Minutes of the Meeting has been '. ($this->isEdit ? 'updated' : 'created') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('moms.index');
    }
    
    public function render()
    {
        return view('livewire.admin.mom.mom-create-edit');
    }
}
