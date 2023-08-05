<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $slide_id;
    public $title;
    public $sub_title;
    public $top_title;
    public $link;
    public $offer;
    public $image;
    public $status;
    public $newImage;

    public function mount(){
       
        $slide = HomeSlider::find($this->slide_id);
        $this->title = $slide->title;
        $this->sub_title = $slide->sub_title;
        $this->top_title = $slide->top_title;
        $this->link = $slide->link;
        $this->offer = $slide->offer;
        $this->image = $slide->image;
        $this->status = $slide->status;
    }

    public function editHomeSlider(){
        $slide = HomeSlider::find($this->slide_id);
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->top_title = $this->top_title;
        $slide->link = $this->link;
        $slide->offer = $this->offer;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('sliders', $imageName);
            $slide->image = $imageName;
        }

        $slide->status = $this->status;
        $slide->save();
        session()->flash('message', 'Slide has been updated successfully!');
        return redirect()->route('admin.slider');
    }
    public function render()
    {
       
        return view('livewire.admin.admin-edit-home-slider-component');
    }
}
