<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {

        $product = Cart::instance('cart_' . session()->getId())->get($rowId);
        $quantity = $product->qty + 1;
        Cart::instance('cart_' . session()->getId())->update($rowId, $quantity);

        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {

        $product = Cart::instance('cart_' . session()->getId())->get($rowId);
        $quantity = $product->qty - 1;
        Cart::instance('cart_' . session()->getId())->update($rowId, $quantity);

        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function destroy($id)
    {

        Cart::instance('cart_' . session()->getId())->remove($id);

        $this->emitTo('cart-icon-component', 'refreshComponent');

        session()->flash('success_message', 'Artikl je obrisan');
    }

    public function changeSize($rowId, $size)
    {
        $product = Cart::instance('cart_' . session()->getId())->get($rowId);
        $product->options->size = $size;

        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function clearCart()
    {
        Cart::instance('cart_' . session()->getId())->destroy();

        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {   //$this->clearCart();
        return view('livewire.cart-component');
    }
}
