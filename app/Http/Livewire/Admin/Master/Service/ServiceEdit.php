<?php

namespace App\Http\Livewire\Admin\Master\Service;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Gallery;
use App\Models\Design;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;
use Storage;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;
use Str;
use App\Models\EventCategory;
class ServiceEdit extends Component
{

    use AlertMessage;
    use WithFileUploads;
    public $gallery_name, $service,$service_order_id = [], $design_photo_path;
    public $design_name = [],$service_id, $design_id = [], $design_description=[],$design_price = [],$blankArr,$service_design;
    public $isEdit = false;
    public $statusList = [];
    public $inputs = [];
    public $i = 1;
    public $photo = [];
    public $eventtypes = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($gallery = null)
    {
        if ($gallery) {
            $this->gallery = $gallery;
             //dd($gallery);
            $this->fill($this->gallery);
            $event_arr = [];
          
            // dump($event_arr);
            // dd($event_arr);
            $this->isEdit = true;
            $this->service_design = $gallery->design;
            //  dd($this->service_design);
            //$this->design_name = 123;
            foreach( $this->service_design as $key => $value) {
                $this->design_name[] = $value->design_name;
                $this->design_price[] = $value->design_price;
                $this->design_description[] = $value->design_description;
                $this->design_id [] = $value->id;
                //dd($this->design_name.$key);
            }

        } 
            
            
    }

    public function saveOrUpdate()
    {

        $validatedDate = $this->validate([
            'gallery_name' => 'required',
            'design_name.*' => 'required',
            'design_description.*' => 'required',
                       
        ], 
        [
            'gallery_name.required' => 'Gallery name field is required',
            'design_name.*.required' => 'Design name field is required',
            'design_description.*.required' => 'Description field is required',
          
           

        ]);

        $validatedData['gallery_name'] = $this->gallery_name;        
        $this->gallery->update($validatedData);       
                   
        //dd($this->design_id)   ;   
        foreach($this->design_id as $key => $design_id){

            $design = Design::where('id',$design_id)->first();
            $design->design_name = $this->design_name[$key];
            $design->design_description = $this->design_description[$key];

            if(isset($this->photo[$key])){
                $photo = $this->photo[$key];
                $design_photo_path = $photo->store('photo', 'public');
                $design->design_photo_path = $design_photo_path;
            }

            $design->update();
          
        }
   
        $msgAction = 'Gallery was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('gallery.index');
    
    }
    public function render()
    {
        return view('livewire.admin.master.service.service-edit');
    }
}
