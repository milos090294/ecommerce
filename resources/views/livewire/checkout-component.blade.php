<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route ('home.index')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-6">
                        <div class="toggle_info">
                            <span><i class="fi-rs-label mr-10"></i><span class="text-muted">Got a discount coupon?</span> <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter the coupon code!</a></span>
                            {{-- flash messages --}}
                            @if (session()->has('coupon_msg'))
                            <div class="bg-green-500 text-dark p-2 rounded">
                                {{ session('coupon_msg') }}
                            </div>
                            @endif
                        </div>
                        <div class="panel-collapse collapse coupon_form " id="coupon">
                            <div class="panel-body">
                                <p class="mb-30 font-sm">If you have a coupon code, please enter it below..</p>
                                <form method="post">
                                    <div class="form-group">
                                        <input wire:model.defer="coupon_code" type="text" placeholder="Enter coupon code...">
                                    </div>
                                    <div class="form-group">
                                        <button wire:click.prevent="applyCoupon" class="btn  btn-md" name="login">Confirm Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                      
                        <form wire:submit.prevent="order">
                            <div class="form-group">
                                <input wire:model="fname" type="text"  name="fname" placeholder="Name*">
                                @error('fname')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="lname" type="text"  name="lname" placeholder="Surname*">
                            @error('lname')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                        
                            <div class="form-group">
                                <input wire:model="billing_address" type="text" name="billing_address"  placeholder="Address*">
                                @error('billing_address')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" name="billing_address2"  placeholder="Address line2">
                            </div> --}}
                            <div class="form-group">
                                <input wire:model="city"  type="text" name="city" placeholder="City*">
                                @error('city')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            {{-- <div class="form-group">
                                <input  type="text" name="state" placeholder="State / County *">
                            </div> --}}
                            <div class="form-group">
                                <input wire:model="zipcode"  type="text" name="zipcode" placeholder="Postcode / ZIP*">
                            @error('zipcode')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="phone" type="text" name="phone" placeholder="Phone*">
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model="email"  type="text" name="email" placeholder="Email*">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Method of payment</h5>
                                  
                                </div>
                                <div class="payment_option mb-20">

                                    <div class="custome-radio">
                                            <input wire:model="payment_option" type="radio" value="Cash on delivery payment" /> Cash on delivery payment
                                    </div>
                                    @error('payment_option')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder=""></textarea>
                            </div>

                            @if (Cart::instance('cart_'.session()->getId())->count() > 0)
                            <button class="btn btn-fill-out btn-block mt-30"  >Send Order</button>

                            @else
                            <button class="btn btn-fill-out btn-block mt-30 mb-30" disabled  >Cart is empty</button>
                            @endif

                            @if(Session::has('success_message'))

                            <div class="alert alert-success">
                                <strong>{{Session::get('success_message')}}</strong>
                            </div>
                            @endif
                        </form>
                    </div>

                     
                   

                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Order</h4>
                            </div>
                            @if(Cart::instance('cart_'.session()->getId())->count() > 0)
                            <div class="table-responsive order_table text-center w-1/">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th colspan="2">Quantity, Size and Price</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::instance('cart_'.session()->getId())->content() as $item)
                                       
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products')}}/{{$item->model->image}}" alt="#"></td>
                                            <td>
                                                <h5 class="product-name"><a href="{{ route ('product.details', ['slug' => $item->model->slug] ) }}">{{$item->model->name}}</a></h5>
                                            </td>
                                            
                                            <td>{{$item->qty}}&nbsp;pieces,&nbsp;{{$item->options->size}},&nbsp;{{ env('CURRENCY') }}&nbsp;{{$item->model->regular_price}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td  w-colspan="2">Price: {{Cart::instance('cart_'.session()->getId())->subtotal()}}&nbsp;{{ env('CURRENCY') }}</td>
                                            <td w-colspan="2">PDV: {{Cart::instance('cart_'.session()->getId())->tax()}}&nbsp;{{ env('CURRENCY') }}</td>
                                            <td w-colspan="2">Shipping: 8 {{ env('CURRENCY') }}</td>

                                        </tr>
                                        <tr>
                                            <td w-colspan="2" class="fw-bold">Total: {{Cart::instance('cart_'.session()->getId())->total() + 8}} &nbsp;{{ env('CURRENCY') }}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <h4 id="no-artikl">Your cart is empty</h4>
                            @endif
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
