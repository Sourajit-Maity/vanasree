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
        $validatedData = $this->validate([
            'notice_number' => 'required',
            'notice_photo_path' => 'required',
            'notice_name' => 'required',
            'notice_description' => 'required',
            'notice_date' => 'required',
            //'notice_time' => 'required',
            'active' => 'required',
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
     
        $msgAction = 'Circular/Notice has been '. ($this->isEdit ? 'updated' : 'created') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('notice.index');
    }
    

    public function render()
    {
        return view('livewire.admin.notice.notice-create-edit');
    }
}
