<div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-white rounded-lg shadow mt-4">
    {{-- Cart Section --}}
    <div class="border-2 p-6 rounded-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Cart</h2>

        @if(count($cart) > 0)
            <div class="space-y-4">
                @foreach($cart as $id => $item)
                {{ $id }}
                    <div class="flex items-center justify-between p-4 bg-gray-100 rounded-lg" :key="$id">
                        {{-- Product Image --}}
                        <img src="{{ $item['options']['img_url'] }}" alt="{{ $item['name'] }}"
                            class="w-16 h-16 object-cover rounded-md">

                        {{-- Product Info --}}
                        <div class="flex-1 ml-4">
                            <h3 class="text-lg font-medium">{{ $item['name'] }}</h3>
                            <p class="text-sm text-gray-500">${{ number_format($item['price'], 2) }}</p>
                        </div>

                        {{-- Quantity Controls --}}
                        <div class="flex items-center space-x-2">
                            <button wire:click="updateCart({{ $id }},'minus')"
                                class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded text-lg font-bold">
                                -
                            </button>
                            <span class="text-lg font-semibold">{{ $item['quantity'] }}</span>
                            <button wire:click="updateCart({{ $id }},'plus')"
                                class="w-8 h-8 flex items-center justify-center bg-gray-300 rounded text-lg font-bold">
                                +
                            </button>
                        </div>

                        {{-- Total Price --}}
                        <h3 class="text-lg font-semibold w-20 text-right">
                            ${{ number_format($item['price'] * $item['quantity'], 2) }}</h3>

                        {{-- Remove Button --}}
                        <button wire:click="deleteCart({{ $id }})" class="text-red-500 hover:text-red-700">
                            🗑
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- Cart Footer --}}
            <div class="flex justify-between items-center mt-6">
                <h3 class="text-xl font-bold">Total:
                    ${{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }}</h3>
            </div>
        @else
            <p class="text-gray-500 text-center text-lg py-6">Your cart is empty.</p>
        @endif
    </div>

    {{-- Address Section --}}
    <div class="border-2 p-6 rounded-lg">
        <form wire:submit="checkOut">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Shipping Address</h2>

            <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="fullName" wire:model="name"
                class="w-full border rounded px-3 py-2 text-sm mt-1 mb-3" placeholder="Enter your full name">

            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea type="text" id="address" wire:model="address"
                class="w-full border rounded px-3 py-2 text-sm mt-1 mb-3" placeholder="Enter your address"></textarea>

            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="phone" wire:model="phone"
                class="w-full border rounded px-3 py-2 text-sm mt-1 mb-3" placeholder="Enter your phone number">

            {{-- Action Buttons --}}
            <div class="flex justify-between mt-4">
                <button wire:click="clearCart()" class="px-4 py-2 bg-red-600 text-white rounded">
                    Clear Cart
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</div>