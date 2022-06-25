<?php

namespace App\Http\Livewire\Admin\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cms;
use App\Models\Pages;
use App\Models\Faqpage;

class ContactusPageEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $content_heading,$title,$banner_background_image,$content_text,$banner_image = "",$content_image="",$details;

   

    public function mount($details = null){
       
        if($details) {
            $details = $details->toArray();
            $this->contactuspagedetails = $details['contact'];
            $this->fill($this->contactuspagedetails);
            $this->isEdit = true;            
        }        
    }


    public function validationRuleForUpdate(): array
    {
        return
            [
                'content_heading' => ['required', 'max:255'],
                'content_text' => ['nullable'],
                'title' => ['required', 'max:30'],
            ];
    }


    public function saveOrUpdate()
    {

        if ($this->details->contact) {
            $validatedData = $this->validate($this->validationRuleForUpdate());

            if (!is_string($this->banner_image)) {
                $this->validate([
                    'banner_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_image);
                $name = md5($this->banner_image . microtime()) . '.' . $this->banner_image->extension();
                $this->banner_image->storeAs("cms_images", $name, "public");
                $validatedData['banner_image'] = "storage/cms_images/" . $name;
            }

            // if (!is_string($this->content_image)) {
            //     $this->validate([
            //         'content_image' => ['mimes:jpg,jpeg,png', 'max:20000']
            //     ]);
            //     File::delete(public_path() . '/storage/' . $this->content_image);
            //     $name = md5($this->content_image . microtime()) . '.' . $this->content_image->extension();
            //     $this->content_image->storeAs("cms_images", $name, "public");
            //     $validatedData['content_image'] = "storage/cms_images/" . $name;
            // }

            if (!is_string($this->banner_background_image)) {
                $this->validate([
                    'banner_background_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_background_image);
                $name = md5($this->banner_background_image . microtime()) . '.' . $this->banner_background_image->extension();
                $this->banner_background_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['banner_background_image' => "cms_images/" . $name]);
                $validatedData['banner_background_image'] = "storage/cms_images/" . $name;
            }
   
            $this->details->contact->update($validatedData);
            $msgAction = $this->details->name . ' Page has been updated';
            $this->showToastr("success", $msgAction);
            return redirect()->route('pages.index');
        }
        $this->showToastr("error", "No record to update!!");
        return redirect()->route('pages.index');
    }
    public function render()
    {
        return view('livewire.admin.cms.contactus-page-edit');
    }
}
