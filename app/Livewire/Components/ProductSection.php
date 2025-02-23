<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSection extends Component
{
    use WithPagination;
    public function render()


    {
        return view('livewire.components.product-section',['products'=>Product::paginate(5)]);
    }
}
