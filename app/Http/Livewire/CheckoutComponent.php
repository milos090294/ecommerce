<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutComponent extends Component
{
    public $fname;
    public $lname;
    public $billing_address;
    public $city;
    public $email;
    public $phone;
    public $zipcode;
    public $payment_option;
    public $total;
    public $coupon_code;

    public function order()
    {
        $this->validate([
            'fname'  => 'required',
            'lname'  => 'required',
            'billing_address' => 'required',
            'city'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'zipcode' => 'required',
            'payment_option' => 'required',

        ]);

        $customer = Customer::create([
            'name'   => $this->fname,
            'lastname'   => $this->lname,
            'address' => $this->billing_address,
            'city'    => $this->city,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'postcode' => $this->zipcode,
        ]);

        $this->total = Cart::instance('cart_' . session()->getId())->total() + 8;


        $order = Order::create([
            'customer_id'   => $customer->id,
            'total'   => $this->total,
        ]);

        foreach (Cart::instance('cart_' . session()->getId())->content() as $item) {

            DB::table('order_product')->insert([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'quantity'   => $item->qty,
                'price'      => $item->price,
                'size'      => $item->options->size,
            ]);
        }

        Cart::instance('cart_' . session()->getId())->destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('success_message', 'Poslali ste narudžbu');
    }

    public function applyCoupon()
    {
        $subscriber = DB::table('subscribers')
            ->where('coupon_code', $this->coupon_code)
            ->where('coupon_status', 'unused')
            ->first();
    
        if ($subscriber) {
            $cartInstance = Cart::instance('cart_' . session()->getId());
            $cartItems = $cartInstance->content(); 
            $totalDiscount = 0; 
    
            foreach ($cartItems as $item) {
                $originalPrice = $item->price; 
                $discountedPrice = $originalPrice * 0.90;
                $totalDiscount += $originalPrice - $discountedPrice;
    
                Cart::update($item->rowId, ['price' => $discountedPrice]);
            }
    
            DB::table('subscribers')
                ->where('id', $subscriber->id)
                ->update(['coupon_status' => 'used']);
    
            session()->flash('coupon_msg', 'Coupon code applied successfully. You saved ' . number_format($totalDiscount, 2) . '!');
        } else {
            session()->flash('coupon_msg', 'Coupon code is invalid or has already been used.');
        }
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
