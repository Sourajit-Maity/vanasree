<?php

namespace App\Http\Livewire\Admin\Cms; 

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cms;
use App\Models\Pages;
use App\Models\HomePage; 

class HomePageEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $banner_background_image,$main_banner_heading,$content3_heading,$active=true,$banner_badge_image,$banner_heading,$banner_sub_heading,$banner_content,$content2_heading,$content1_subheading,$content2_option_image3,
    $content1_heading,$content3_text,$content2_option_text1,$content1_text,$content2_option_heading1,$content2_option_heading3,
    $content2_text,$content2_option_text2,$content2_option_heading2,$content1_image = "",$content2_option_text3,
    $content2_option_image1 = "",$content2_option_image2 = "",$content3_image = "",$content2_image = "",$details,
    $content2_option_image5 = "",
    $content2_option_image4 = "",
    $content2_option_image6 = "",
    $content2_option_image7 = "",
    $logo = "",
    $content2_option_image22 = "",
    $content2_option_image8 = "",
    $content2_option_image9= "",
    $content2_option_image10 = "",
    $banner_main_image = "",
    $setup_image= "",
    $banner_setup_image = "";

    public $statusList=[];
    public function mount($details = null){
        if($details) {
            $details = $details->toArray();
            $this->homepagedetails = $details['home'];
            $this->fill($this->homepagedetails);
            $this->isEdit = true;            
        } 
        $this->statusList=[
            ['value'=>1, 'text'=> "Active"],
            ['value'=>0, 'text'=> "Inactive"]
        ];      
    }


    public function validationRuleForUpdate(): array
    {
        return
            [ 
                'banner_heading' => ['required', 'max:255'],
                'banner_sub_heading' => ['required', 'max:255'],
                'content1_heading' => ['required', 'max:255'],
                'content1_text' => ['required'],
                'content2_heading' => ['required'],
                'content2_text' => ['required', 'max:255'],
                'content3_heading' => ['required'],
                'content3_text' => ['required', 'max:255'],
                'content2_option_heading1' => ['required'],
                'content2_option_text1' => ['required', 'max:255'],
                'content2_option_text2' => ['required'], 
                'main_banner_heading'=>['required'],                      
                'content2_option_heading2'=>['required'],                      

            ];
    }


    public function saveOrUpdate()
    {
        // dd($this->cms->home);
        // dd($this);
        if ($this->details->home) {
            $validatedData = $this->validate($this->validationRuleForUpdate());

          
            if (!is_string($this->content1_image)) {
                $this->validate([
                    'content1_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content1_image);
                $name = md5($this->content1_image . microtime()) . '.' . $this->content1_image->extension();
                $this->content1_image->storeAs("cms_images", $name, "public");
                $validatedData['content1_image'] = "storage/cms_images/" . $name;
            }
           
           if (!is_string($this->content2_option_image1)) {
                $this->validate([
                    'content2_option_image1' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image1);
                $name = md5($this->content2_option_image1 . microtime()) . '.' . $this->content2_option_image1->extension();
                $this->content2_option_image1->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image1' => "cms_images/" . $name]);
                $validatedData['content2_option_image1'] = "storage/cms_images/" . $name;
            }
            if (!is_string($this->content2_image)) {
                $this->validate([
                    'content2_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_image);
                $name = md5($this->content2_image . microtime()) . '.' . $this->content2_image->extension();
                $this->content2_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_image' => "cms_images/" . $name]);
                $validatedData['content2_image'] = "storage/cms_images/" . $name;
            }
            if (!is_string($this->content3_image)) {
                $this->validate([
                    'content3_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content3_image);
                $name = md5($this->content3_image . microtime()) . '.' . $this->content3_image->extension();
                $this->content3_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content3_image' => "cms_images/" . $name]);
                $validatedData['content3_image'] = "storage/cms_images/" . $name;
            }
            if (!is_string($this->content2_option_image2)) {
                $this->validate([
                    'content2_option_image2' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image2);
                $name = md5($this->content2_option_image2 . microtime()) . '.' . $this->content2_option_image2->extension();
                $this->content2_option_image2->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image2' => "cms_images/" . $name]);
                $validatedData['content2_option_image2'] = "storage/cms_images/" . $name;
            }   
            if (!is_string($this->content2_option_image3)) {
                $this->validate([
                    'content2_option_image3' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image3);
                $name = md5($this->content2_option_image3 . microtime()) . '.' . $this->content2_option_image3->extension();
                $this->content2_option_image3->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image3' => "cms_images/" . $name]);
                $validatedData['content2_option_image3'] = "storage/cms_images/" . $name;
            }   

            //
            if (!is_string($this->banner_badge_image)) {
                $this->validate([
                    'banner_badge_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_badge_image);
                $name = md5($this->banner_badge_image . microtime()) . '.' . $this->banner_badge_image->extension();
                $this->banner_badge_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['banner_badge_image' => "cms_images/" . $name]);
                $validatedData['banner_badge_image'] = "storage/cms_images/" . $name;
            }

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
            if (!is_string($this->content2_option_image22)) {
                $this->validate([
                    'content2_option_image22' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image22);
                $name = md5($this->content2_option_image22 . microtime()) . '.' . $this->content2_option_image22->extension();
                $this->content2_option_image22->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image22' => "cms_images/" . $name]);
                $validatedData['content2_option_image22'] = "storage/cms_images/" . $name;
            }  
            
            if (!is_string($this->content2_option_image4)) {
                $this->validate([
                    'content2_option_image4' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image4);
                $name = md5($this->content2_option_image4 . microtime()) . '.' . $this->content2_option_image4->extension();
                $this->content2_option_image4->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image4' => "cms_images/" . $name]);
                $validatedData['content2_option_image4'] = "storage/cms_images/" . $name;
            }   

            if (!is_string($this->content2_option_image5)) {
                $this->validate([
                    'content2_option_image5' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image5);
                $name = md5($this->content2_option_image5 . microtime()) . '.' . $this->content2_option_image5->extension();
                $this->content2_option_image5->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image5' => "cms_images/" . $name]);
                $validatedData['content2_option_image5'] = "storage/cms_images/" . $name;
            }   

            if (!is_string($this->content2_option_image6)) {
                $this->validate([
                    'content2_option_image6' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image6);
                $name = md5($this->content2_option_image6 . microtime()) . '.' . $this->content2_option_image6->extension();
                $this->content2_option_image6->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image6' => "cms_images/" . $name]);
                $validatedData['content2_option_image6'] = "storage/cms_images/" . $name;
            }   


            if (!is_string($this->content2_option_image7)) {
                $this->validate([
                    'content2_option_image7' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image7);
                $name = md5($this->content2_option_image7 . microtime()) . '.' . $this->content2_option_image7->extension();
                $this->content2_option_image7->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image7' => "cms_images/" . $name]);
                $validatedData['content2_option_image7'] = "storage/cms_images/" . $name;
            }   

            if (!is_string($this->logo)) {
                $this->validate([
                    'logo' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->logo);
                $name = md5($this->logo . microtime()) . '.' . $this->logo->extension();
                $this->logo->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['logo' => "cms_images/" . $name]);
                $validatedData['logo'] = "storage/cms_images/" . $name;
            }  
            

            if (!is_string($this->content2_option_image8)) {
                $this->validate([
                    'content2_option_image8' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image8);
                $name = md5($this->content2_option_image8 . microtime()) . '.' . $this->content2_option_image8->extension();
                $this->content2_option_image8->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image8' => "cms_images/" . $name]);
                $validatedData['content2_option_image8'] = "storage/cms_images/" . $name;
            }   


            if (!is_string($this->content2_option_image9)) {
                $this->validate([
                    'content2_option_image9' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image9);
                $name = md5($this->content2_option_image9 . microtime()) . '.' . $this->content2_option_image9->extension();
                $this->content2_option_image9->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image9' => "cms_images/" . $name]);
                $validatedData['content2_option_image9'] = "storage/cms_images/" . $name;
            }   

            if (!is_string($this->content2_option_image10)) {
                $this->validate([
                    'content2_option_image10' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->content2_option_image10);
                $name = md5($this->content2_option_image10 . microtime()) . '.' . $this->content2_option_image10->extension();
                $this->content2_option_image10->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['content2_option_image10' => "cms_images/" . $name]);
                $validatedData['content2_option_image10'] = "storage/cms_images/" . $name;
            } 


            //

            if (!is_string($this->banner_main_image)) {
                $this->validate([
                    'banner_main_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_main_image);
                $name = md5($this->banner_main_image . microtime()) . '.' . $this->banner_main_image->extension();
                $this->banner_main_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['banner_main_image' => "cms_images/" . $name]);
                $validatedData['banner_main_image'] = "storage/cms_images/" . $name;
            }   


            if (!is_string($this->banner_setup_image)) {
                $this->validate([
                    'banner_setup_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_setup_image);
                $name = md5($this->banner_setup_image . microtime()) . '.' . $this->banner_setup_image->extension();
                $this->banner_setup_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['banner_setup_image' => "cms_images/" . $name]);
                $validatedData['banner_setup_image'] = "storage/cms_images/" . $name;
            }   

            if (!is_string($this->setup_image)) {
                $this->validate([
                    'setup_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->setup_image);
                $name = md5($this->setup_image . microtime()) . '.' . $this->setup_image->extension();
                $this->setup_image->storeAs("cms_images", $name, "public");
                // $this->cms->home->update(['setup_image' => "cms_images/" . $name]);
                $validatedData['setup_image'] = "storage/cms_images/" . $name;
            } 


            
            $this->details->home->update($validatedData);
            $msgAction = $this->details->name . ' Page has been updated';
            $this->showToastr("success", $msgAction);
            return redirect()->route('pages.index');
        }
        $this->showToastr("error", "No record to update!!");
        return redirect()->route('pages.index');
    }

    public function render()
    {
        return view('livewire.admin.cms.home-page-edit');
    }
}
    
