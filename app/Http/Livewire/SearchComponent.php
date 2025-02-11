<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{

    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'All Articles';

    public $q;
    public $search_term;

    public function mount()
    {
        $this->fill(request()->only('q')); //filuje public propertije
        $this->search_term = '%' . $this->q . '%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash("success_message", "Item added to Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');

        return redirect()->route('shop.cart');
    }


    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist' . session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }


    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }


    public function render()
    {
        if ($this->orderBy == 'Cijena: od manje prema većoj') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } else if ($this->orderBy == 'Cijena: od veće prema manjoj') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } else if ($this->orderBy == 'Najnoviji artikli') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::where('name', 'like', $this->search_term)->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(3);

        return view('livewire.search-component', compact('products', 'categories', 'lproducts'));
    }
}
