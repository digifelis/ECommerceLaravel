<div class="container">
    <div class="table-responsive">
        <table class="table shopping-summery text-center clean">

            @foreach(Cart::instance('wishlist')->content() as $item)
            <tr>
                <td colspan="6">
                    <div class="image product-thumbnail">  
                        <a href="{{route('product.details', ['slug' => $item->options->slug])}}"><img alt="{{$item->name}}" src="{{ asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpg"></a>
                    </div>
                </td>
                <td>{{$item->name}}</td>
                <td>${{$item->price}}</td>
                <td>
                    <div class="product-quantity">
                        {{$item->qty}}
                    </div>
                </td>
                <td>${{$item->subtotal}}</td>
                <td>
                    <a href="#" wire:click.prevent="remove('{{$item->rowId}}')"><i class="fi-rs-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>



