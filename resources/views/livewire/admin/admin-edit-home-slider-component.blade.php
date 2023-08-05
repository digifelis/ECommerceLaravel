<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-0">
        <div class="card">
            <h5 class="card-header">Edit Home Slider</h5>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <a href="{{route('admin.slider')}}" class="btn btn-primary">List Admin Home Sliders</a>
            </div>
        </div>

            <form action="" wire:submit.prevent="editHomeSlider">
                @csrf
                <div class="form-group" >
                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" wire:model="title">
                    </div>

                    <div class="form-group">
                        <label for="sub_title">sub_title</label>
                        <input type="text" name="sub_title" wire:model="sub_title" >
                    </div>
                    <div class="form-group">
                        <label for="top_title">top_title</label>
                        <input type="text" name="top_title" wire:model="top_title" >
                    </div>
                    <div class="form-group">
                        <label for="link">link</label>
                        <input type="text" name="link" wire:model="link" >
                    </div>
                    <div class="form-group">
                        <label for="offer">offer</label>
                        <input type="text" name="offer" wire:model="offer" >
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" wire:model="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="newImage" wire:model="newImage">
                        @if($image)
                        <img src="{{asset('assets/imgs/sliders')}}/{{$image}}" width="120" />
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>


