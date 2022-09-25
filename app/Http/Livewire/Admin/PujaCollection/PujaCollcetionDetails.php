<?php

namespace App\Http\Livewire\Admin\PujaCollection;

use Livewire\Component;
use App\Models\User;
use App\Models\PujaCollection;
class PujaCollcetionDetails extends Component
{

    public $pujacollcetion;

    public function mount($pujacollcetion = null)
    {
       $this->pujacollcetion = $pujacollcetion;
    }
    public function render()
    {
        $details = PujaCollection::where('id',$this->pujacollcetion)->with('user')->first();
        // dd($details);
        return view('livewire.admin.puja-collection.puja-collcetion-details',['details'=>$details]);
    }
}
