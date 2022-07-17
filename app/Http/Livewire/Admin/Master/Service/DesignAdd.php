<?php

namespace App\Http\Livewire\Admin\Master\Service;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\Gallery;
use Storage;
use Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Log;

class DesignAdd extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $design_name,$gallery,$design_order,$design, $design_description,$blankArr;
    public $isEdit = false;
    public $statusList = [];
    public $services = [];
    public $inputs = [];
    public $photos = [];
    public $i = 1;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($gallery = null, $design =null) 
    {
        $this->design = $design;
        if ($gallery) {
            $this->gallery = $gallery;
           
            $this->fill($this->gallery);
            $this->isEdit = true;
        } else
            $this->gallery = new Design;

            $this->blankArr = [
                "value"=> "", "text"=> "== Select One =="
            ];

    }


    public function saveOrUpdate()
    {
        $rules = array();
        $messages = array();
        $this->inputCount = count($this->inputs);

        if($this->inputCount > 0){
            foreach($this->inputs as $key=>$index){
                $validrules = [
                    'design_name.'.$index => 'required',
                    'design_description.'.$index => 'required',
                    'photos.'.$index => 'required|mimes:jpg,jpeg,png'
        
                ];
                $validmessage = [
                    'design_name.'.$index.'.required' => 'Design name field is required',
                    'design_description.'.$index.'.required' => 'Description field is required',
                    'photos.'.$index.'.required' => 'Photo field is required'
        
                ];
                $rules = array_merge($rules,$validrules);
                $messages = array_merge($messages,$validmessage);
            }

            $normalrules = [
                'design_name.0' => 'required',
                'design_description.0' => 'required',
                'photos.0' => 'required|mimes:jpg,jpeg,png'
    
            ];
            $normalmessage = [
                'design_name.0.required' => 'Design name field is required',
                'design_description.0.required' => 'Description field is required',
                'photos.0.required' => 'Photo field is required'
    
            ];
            $rules = array_merge($rules, $normalrules);
            $messages = array_merge($messages,$normalmessage);
            $this->validate($rules,$messages);

        }

        else{
            
            $validatedDate = $this->validate([
               
                'design_name.0' => 'required',
                'design_description.0' => 'required',
                'photos.0' => 'required|mimes:jpg,jpeg,png',         
            ],  
            [
               
                'design_name.0.required' => 'Design name field is required',
                'design_description.0.required' => 'Description field is required',
                'photos.0.required' => 'Photo field is required'
    
            ]);
        }
   

     foreach ($this->design_name as $key => $value) 
     {

        $photo = $this->photos[$key];
        $design_photo_path = $photo->store('photo', 'public');

        $insert = Design::create(['design_name' => $this->design_name[$key], 
        'design_description' => $this->design_description[$key], 
        'design_photo_path' => $design_photo_path,
        'design_order' => $key == 1,
        'gallery_id' => $this->design]);
    
    }

    $this->inputs = [];

    $this->resetInputFields();

        $msgAction = 'Image was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('gallery.index');
    }
    public function render()
    {
        return view('livewire.admin.master.service.design-add');
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
    private function resetInputFields(){
        $this->service_description = '';
        $this->design_name = '';
        $this->design_photo_path = '';
    }

}
    
