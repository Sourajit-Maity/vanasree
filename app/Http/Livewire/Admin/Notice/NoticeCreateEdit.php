<?php

namespace App\Http\Livewire\Admin\Notice;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Notice;
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

class NoticeCreateEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $notice_number,$active, $notice,$notice_photo_path,$user_id;
    public $notice_name, $notice_description, $notice_time, $notice_date,$blankArr;
    public $isEdit = false;
    public $statusList = [];
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($notice = null)
    {
        if ($notice) {
            $this->notice = $notice;
            $this->fill($this->notice);
            $this->isEdit = true;
        }
         else
        $this->notice = new Notice;
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
                'notice_number' => ['required', 'max:255'],
                'notice_photo_path' => ['required'],
                'notice_name' => ['required'],
                'notice_date' => ['required', 'date'],
                'notice_description' => ['required'],
                'active' => ['required'],
            ]);
        if(!$this->isEdit){
            $validatedData['notice_photo_path'] = $this->notice_photo_path->store('files', 'public');
        }
        if($this->isEdit){
            if($validatedData['notice_photo_path'] == $this->notice->notice_photo_path){
                
                $validatedData['notice_photo_path'] = $this->notice->notice_photo_path;
            }
           else{
            $validatedData['notice_photo_path'] = $this->notice_photo_path->store('files', 'public');
        }
        }
        $validatedData['user_id'] = auth()->user()->id;

        if(!$this->isEdit)
        $this->notice = Notice::create($validatedData);
        if($this->isEdit)
        $this->notice->update($validatedData);
     

        //send successfully register mail
        $users = User::where('active', 1)->get();
        foreach($users as $user){
            $myEmail = $user->email;
            //dd($myEmail);
            $details = [
                'name' =>  $user->first_name.$user->last_name,
                'mail_title' => 'Notice/Circular',
                'mail_subject' => 'Notice/Circular',
                'mail_body' => 'Please check the Notice/Circular',                
                'notice_number' => $this->notice->notice_number,
                'notice_name' => $this->notice->notice_name,
                'notice_date' => $this->notice->notice_date,
                'notice_description' => $this->notice->notice_description, 
            ];
            Mail::to($myEmail)->send(new NoticeMail($details));
        }
       

        $msgAction = 'Circular/Notice has been '. ($this->isEdit ? 'updated' : 'created') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('notice.index');
    }
    

    public function render()
    {
        return view('livewire.admin.notice.notice-create-edit');
    }
}
