<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public function updateCart(string $id,string $action){
        \App\Facades\Cart::update($id,$action);

        $this->dispatch('productAddedToCart');

    }
public function deleteCart(string $id){
    \App\Facades\Cart::remove( $id );
    $this->dispatch('productAddedToCart');
}
    
    public function render()
    {

        return view('livewire.cart',
    
        ['cart'=>\App\Facades\Cart::content()]);
    }
}
