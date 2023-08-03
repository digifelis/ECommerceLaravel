<div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="{{route('product.wishlistall')}}">
            <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg') }}">
            @if(Cart::instance('wishlist')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                @foreach(Cart::instance('wishlist')->content() as $item)
                <li>
                    <div class="shopping-cart-img">
                    
                        <a href="{{route('product.details', ['slug' => $item->options->slug])}}"><img alt="{{$item->name}}" src="{{ asset('assets/imgs/shop/product-')}}{{$item->id}}-1.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{route('product.details', ['slug' => $item->options->slug])}}">{{$item->name}}</a></h4>
                        <h4><span>{{$item->qty}} × </span>${{$item->subtotal}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
                
            </ul>

        </div>
    </div>
</div