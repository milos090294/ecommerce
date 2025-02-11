<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist' . session()->getId())->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist' . session()->getId())->remove($witem->rowId);
                $this->emitTo('wish-list-icon-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
