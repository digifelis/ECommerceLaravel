<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $sub_title;
    public $top_title;
    public $link;
    public $offer;
    public $image;
    public $status;
    
    /**
     * addHomeSlider
     *
     * @return void
     */
    public function addHomeSlider(){
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->top_title = $this->top_title;
        $slider->link = $this->link;
        $slider->offer = $this->offer;
        $imageName = Str::slug($this->title, '-').'_'.Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been created successfully!');
        return redirect()->route('admin.slider');

    }    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
