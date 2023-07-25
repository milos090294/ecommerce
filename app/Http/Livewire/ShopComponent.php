<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{

    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Svi artikli';
    public $min_value = 0;
    public $max_value = 100;
    public $count_red;
    public $count_green;
    public $count_blue;
    public $red;
    public $green;
    public $blue;
    public $category;

    public function mount()
    {
        $this->count_red = Product::where('color', 'red')->count();
        $this->count_blue = Product::where('color', 'blue')->count();
        $this->count_green = Product::where('color', 'green')->count();
    }

    public function store($product_id, $product_name, $product_price)
    {
        $options = ['size' => 'M'];
        Cart::instance('cart_'.session()->getId())->add($product_id, $product_name, 1, $product_price, $options)->associate('\App\Models\Product');
        session()->flash("success_message", "Item added to Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {


        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {

        $this->orderBy = $order;
    }

    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist'.session()->getId())->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist'.session()->getId())->content() as $witem) {
            if ($witem->id == $product_id) {

                Cart::instance('wishlist'.session()->getId())->remove($witem->rowId);
                $this->emitTo('wish-list-icon-component', 'refreshComponent');
                return;
            }
        }
    }


    public function render()
    {

        $colors = [];
        if ($this->red) {
            $colors[] = 'red';
        }
        if ($this->green) {
            $colors[] = 'green';
        }
        if ($this->blue) {
            $colors[] = 'blue';
        }
        if ($this->orderBy == 'Cijena: od manje prema većoj') {

            $products = Product::when($colors, function ($query) use ($colors) {
                return $query->whereIn('color', $colors);
            })
                ->when($this->category, function ($query) {
                    return $query->where('category_id', $this->category);
                })
                ->whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'ASC')
                ->paginate($this->pageSize);
        } else if ($this->orderBy == 'Cijena: od veće prema manjoj') {

            $products = Product::when($colors, function ($query) use ($colors) {
                return $query->whereIn('color', $colors);
            })
                ->when($this->category, function ($query) {
                    return $query->where('category_id', $this->category);
                })
                ->whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'DESC')
                ->paginate($this->pageSize);
        } else if ($this->orderBy == 'Najnoviji artikli') {

            $products = Product::when($colors, function ($query) use ($colors) {
                return $query->whereIn('color', $colors);
            })
                ->when($this->category, function ($query) {
                    return $query->where('category_id', $this->category);
                })
                ->whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')
                ->paginate($this->pageSize);
        } else {

            $products = Product::when($colors, function ($query) use ($colors) {
                return $query->whereIn('color', $colors);
            })
                ->when($this->category, function ($query) {
                    return $query->where('category_id', $this->category);
                })
                ->whereBetween('regular_price', [$this->min_value, $this->max_value])
                ->paginate($this->pageSize);
        }

        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(3);
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('livewire.shop-component', compact('products', 'categories', 'lproducts'));
    }
}
