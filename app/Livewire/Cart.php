<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItems;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component

    

{
    public $name;
    public $address;
    public $phone;

    public function checkOut(){
        $this->validate([
            "name"=> "required",
            "address"=> "required",
            "phone"=> "required",
            ]);
            if(\App\Facades\Cart::total()<=0){
                $this->alert('error','Cart is empty');
            }
            $order =Order::create([
                'name'=>$this->name,
                'address'=>$this->address,
                'phone'=>$this->phone,
                'total'=>\App\Facades\Cart::total(),
            ]);
            foreach(\App\Facades\Cart::content() as $id => $item){
               $orderItem= new OrderItems(
                [
                    'order_id'=>$order->id,
                    'product_id'=>$id,
                    'quantity'=>$item['quantity'],
                    'price'=>$item['price'],
                    'total'=>  $item['quantity']*$item['price'],
                ]
                );
            }

            $orderItem->save();
            \App\Facades\Cart::clear();
    }
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
