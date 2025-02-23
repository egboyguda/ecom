<?php

namespace App\Livewire\Components;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;

    public function addTocart(){

        Cart::add($this->product->id,$this->product->name,$this->product->price,1);
        $this->dispatch('productAddedToCart');
    }
    
    
    public function gotoPage(){
        $this ->redirect('/product/'.$this->product->id,navigate:true);
    }
    
}
