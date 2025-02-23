<?php

namespace App\Livewire;

use App\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
  
    #[On('productAddedToCart')]
    public function upDateCart(){

    }

    public function render()
    {
        return view('livewire.header',['total'=>Cart::totalProducts()]);
    }
}
