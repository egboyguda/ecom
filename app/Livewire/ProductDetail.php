<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    
    public $quantity = 1;
    public function addCart(){
        Cart::add($this->product->id,$this->product->name,$this->product->price,$this->quantity,['img_url'=>$this->product->img_url]);
        $this->dispatch('productAddedToCart');
    }
    public function mount(Product $product)
    {
        $this->product = $product;
    }
   
    public function render()
    {
        return view('livewire.product-detail',['cart'=>Cart::content()]);
    }
}
