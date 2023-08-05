<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\Pagination;

class AdminHomeSliderComponent extends Component
{
    public $homeSliderId;
    public function deleteHomeSlider()
    {
        $slide = HomeSlider::find($this->homeSliderId);
        $slide->delete();
        session()->flash('message', 'Slide has been deleted successfully!');
    }

    public function render()
    {
        $homeSliders = HomeSlider::paginate(10);
        return view('livewire.admin.admin-home-slider-component', ['homeSliders' => $homeSliders]); 
    }
}
