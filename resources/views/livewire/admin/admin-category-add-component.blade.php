<div class="container">
    <div class="row">
        <div class="col-6">
            <form>
                <div class="form-group">
                    <label for="categoryname">Category Name</label>
                    <input type="text" class="form-control" id="categoryname" wire:model="name" wire:keyup="generateSlug">
                </div>
                <div class="form-group">
                    <label for="categoryslug">Category Slug</label>
                    <input type="text" class="form-control" id="categoryslug" wire:model="slug">
                </div>
                <button class="btn btn-primary" wire:click.prevent="storeCategory">Submit</button>
            </form>
        </div>
    </div>

</div>
