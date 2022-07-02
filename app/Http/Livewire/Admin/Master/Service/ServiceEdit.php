<?php

namespace App\Http\Livewire\Admin\Master\Service;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Design;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Storage;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
use Str;
class ServiceEdit extends Component
{

    use AlertMessage;
    use WithFileUploads;
    public $design_name,$active, $gallery, $design_photo_path, $user_id;
    public $design_description, $blankArr;
    public $isEdit = false;
    public $statusList = [];
    public $photos = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($gallery = null)
    {
        if ($gallery) {
            $this->gallery = $gallery;
            $this->fill($this->gallery);
            $this->isEdit = true;
        }
         else
        $this->gallery = new Design;
        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        
    }


    public function saveOrUpdate(Request $request)
    {
        $validatedData = $this->validate([
            'design_name' => 'required',
            'design_photo_path' => 'required',
            'design_description' => 'required',
            'active' => 'required',
        ]);

        if($this->isEdit){
            if($validatedData['design_photo_path'] == $this->gallery->design_photo_path){
                
                $validatedData['design_photo_path'] = $this->gallery->design_photo_path;
            }
           else{
                $validatedData['design_photo_path'] = $this->design_photo_path->store('photo', 'public');
            }
        }
        
        // $validatedData['design_photo_path'] = $this->design_photo_path->store('photo', 'public');
        $validatedData['user_id'] = auth()->user()->id;

        if(!$this->isEdit)
        $this->gallery = Design::create($validatedData); 
        if($this->isEdit)
        $this->gallery->update($validatedData);
     
        $msgAction = 'Image has been '. ($this->isEdit ? 'updated' : 'created') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('gallery.index');
    }
    public function render()
    {
        return view('livewire.admin.master.service.service-edit');
    }
}
