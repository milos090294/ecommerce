
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" >
            <img alt="Surfside Media" src="{{asset ('assets/imgs/theme/icons/icon-cart.svg')}}">
            @if(Cart::instance('cart_'.session()->getId())->count() > 0)
            <span class="pro-count blue">{{Cart::instance('cart_'.session()->getId())->count()}}</span>
            @endif
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2" style="z-index: 999999999999999999999999999999999999999999999999999999999999999 !important;">
            <ul>
                @foreach (Cart::instance('cart_'.session()->getId())->content() as $item)
                    
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{ route ('product.details', ['slug' => $item->model->slug] ) }}"><img alt="{{$item->model->name}}" src="{{ asset('assets/imgs/products')}}/{{$item->model->image}}"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{ route ('product.details', ['slug' => $item->model->slug] ) }}">{{substr($item->model->name, 0,20)}}...</a></h4>
                        <h4><span>{{$item->qty}}× </span>${{$item->model->regular_price}}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>${{Cart::instance('cart_'.session()->getId())->total()}}</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route ('shop.cart')}}" class="outline">View cart</a>
                    <a href="{{route ('shop.checkout')}}">Checkout</a>
                </div>
            </div>
        </div>
    </div>

  