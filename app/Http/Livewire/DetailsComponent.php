<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{

    public $slug;
    public $quantity = 1;
    public $size = "S";

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        $options = ['size' => $this->size];

        Cart::instance('cart_' . session()->getId())->add($product_id, $product_name, $this->quantity, $product_price, $options)->associate('\App\Models\Product');
        session()->flash("success_message", "Item added to Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }


    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist' . session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component', compact('product', 'rproducts', 'nproducts'));
    }
}
