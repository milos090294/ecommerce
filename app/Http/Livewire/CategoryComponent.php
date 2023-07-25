<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{   

    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Svi artikli';
    public $slug;

    public function store($product_id, $product_name, $product_price) {

        Cart::instance('cart_'.session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash("success_message", "Item added to Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');

    }

    public function changePageSize($size){


        $this->pageSize =$size;
    }

    public function changeOrderBy($order){

        $this->orderBy = $order;

    }

    public function mount($slug){
        $this->slug = $slug;
    }

    
    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist'.session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }


    public function render()
    {   
        $category = Category::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->orderBy == 'Cijena: od manje prema većoj'){

            $products = Product::where('category_id', $category_id)
            ->orderBy('regular_price', 'asc')
            ->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Cijena: od veće prema manjoj'){
            $products = Product::where('category_id', $category_id)
            ->orderBy('regular_price', 'desc')
            ->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Najnoviji artikli'){
            $products = Product::where('category_id', $category_id)
                    ->orderBy('created_at', 'desc')
                    ->paginate($this->pageSize);
        }else{
            $products = Product::where('category_id', $category_id)->paginate($this->pageSize);

        }

        $categories = Category::orderBy('name', 'ASC')->get();
        
        return view('livewire.category-component', compact('products', 'categories', 'category_name'));
    }
}
