<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\HomeSlider;
use Cart;

class HomeComponent extends Component
{   

    public function store($product_id, $product_name, $product_price) {

        Cart::instance('cart_'.session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash("success_message", "Item added to Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart', );

    }

    
    
    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist'.session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function render()
    {   
       
        $slides = HomeSlider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $fproducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $pcategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component', compact('slides', 'lproducts', 'fproducts', 'pcategories'));
    }
}
