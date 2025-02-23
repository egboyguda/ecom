<div class="max-w-3xl border-2 mx-auto p-6 bg-white rounded-lg shadow mt-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Cart</h2>
   
    @if(count($cart) > 0)
        <div class="space-y-4">
            @foreach($cart as $id => $item)
                <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg" :key="$id">
                    {{-- Product Image --}}
                    <img src="{{ $item['options']['img_url'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md">

                    {{-- Product Info --}}
                    <div class="flex-1 ml-4">
                        <h3 class="text-lg font-medium">{{ $item['name'] }}</h3>
                        <p class="text-sm text-gray-500">${{ number_format($item['price'], 2) }}</p>
                    </div>

                    {{-- Quantity Controls --}}
                    <div class="flex items-center space-x-2">
                        <button wire:click="updateCart({{ $id }},'minus')" class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded text-lg font-bold">
                            -
                        </button>
                        <span class="text-lg font-semibold">{{ $item['quantity'] }}</span>
                        <button wire:click="updateCart({{ $id }},'plus')" class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded text-lg font-bold">
                            +
                        </button>
                    </div>

                    {{-- Total Price --}}
                    <h3 class="text-lg font-semibold w-20 text-right">${{ number_format($item['price'] * $item['quantity'], 2) }}</h3>

                    {{-- Remove Button --}}
                    <button wire:click="deleteCart({{ $id }})" class="text-red-500 hover:text-red-700">
                        🗑
                    </button>
                </div>
            @endforeach
        </div>

        {{-- Cart Footer --}}
        <div class="flex justify-between items-center mt-6">
            <h3 class="text-xl font-bold">Total: ${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</h3>
            <div class="space-x-3">
                <button wire:click="clearCart()" class="px-4 py-2 bg-red-600 text-white rounded">
                    Clear Cart
                </button>
                <button wire:click="placeOrder()" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Place Order
                </button>
            </div>
        </div>
    @else
        <p class="text-gray-500 text-center text-lg py-6">Your cart is empty.</p>
    @endif
</div>
