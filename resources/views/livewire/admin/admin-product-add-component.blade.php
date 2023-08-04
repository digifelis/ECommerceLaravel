<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-0">
        <div class="card">
            <h5 class="card-header">Edit Product</h5>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <a href="{{route('admin.product')}}" class="btn btn-primary">List Product</a>
            </div>
        </div>

            <form action="" wire:submit.prevent="addProduct">
                @csrf
                <div class="form-group" >
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" wire:model="name" wire:keyup="generateSlug" >
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" wire:model="slug">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" wire:model="image">
                        @if($image)
                        <img src="{{$image->temporaryUrl()}}" width="120" />
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="short_description">short_description</label>
                        <input type="text" name="short_description" wire:model="short_description">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" wire:model="description">
                    </div>
                    <div class="form-group">
                        <label for="regular_price">regular_price</label>
                        <input type="text" name="regular_price" wire:model="regular_price">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">sale_price</label>
                        <input type="text" name="sale_price" wire:model="sale_price">
                    </div>
                    <div class="form-group">
                        <label for="SKU">SKU</label>
                        <input type="text" name="SKU" wire:model="SKU">
                    </div>
                    <div class="form-group">
                        <label for="stock_status">stock_status</label>
                        <select name="stock_status" wire:model="stock_status">
                            <option value="instock">In Stock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featured">featured</label>
                        <select name="featured" wire:model="featured">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">quantity</label>
                        <input type="text" name="quantity" wire:model="quantity">
                    </div>
                    <div class="form-group">
                        <label for="category_id">category_id</label>
                        <select name="category_id" wire:model="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach 
                        </select>
                    </div>



                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

