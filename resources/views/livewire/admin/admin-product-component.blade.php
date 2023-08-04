<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col">
          @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a class="btn btn-danger" href="{{route('admin.product.add')}}">Add New Product</a>
        </div>
    </div>
    <table class="table-responsive" style="margin-top:10px;">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td class="image product-thumbnail">
                <img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="#">
            </td>
            <td>{{$product->name}}</td>
            <td>{{$product->slug}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                <li class="list-inline-item">
                    <a href="{{route('admin.product.edit', ['product_id' => $product->id])}}" class="text-muted" ><i class="fi-rs-edit"></i></a>
                    
                    <a href="#" class="text-muted" title="Delete" onclick="confirmDelete({{$product->id}})"><i class="fi fi-rs-trash" style="color: #ff3300;"></i></a>
                </li>
             
            </td>
        </tr>
        @endforeach
    </table>
    {{$products->links()}}
</div>

<div class="modal" tabindex="-1" role="dialog" id="confirm-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="deleteProduct()">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-toogle="modal" data-bs-target="confirm-delete">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
 function confirmDelete(id){
    @this.set('productId', id);
     $('#confirm-delete').modal('show');
 }
 function deleteProduct(){
     $('#confirm-delete').modal('hide');
     @this.call('deleteProduct');
 }

</script>
@endpush
