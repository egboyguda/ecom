<div class=" mt-4 border-2 max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Product Image -->
        <div class="flex justify-center">
            <img class="w-full h-80 object-cover rounded-lg" 
                 src="{{ asset($product->img_url) ?? 'https://picsum.photos/300/600' }}" 
                 alt="{{ $product->name }}">
        </div>

        <!-- Product Details -->
        <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $product->description }}</p>

            <div class="mt-4">
                <span class="text-yellow-600 font-semibold text-2xl">${{ number_format($product->price, 2) }}</span>
            </div>

            <!-- Quantity Selector -->
            <div class="flex items-center mt-4">
                <span class="text-gray-700 mr-2">Quantity:</span>
                <input type="number" min="1" value="1" 
                       wire:model="quantity" class="w-16 border border-gray-300 rounded-md text-center focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-6">
                <button wire:click="addCart" class="w-1/2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Add to Cart
                </button>
                <button class="w-1/2 bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg hover:bg-yellow-500 transition duration-300">
                    Buy Now
                </button>
            </div>
            {{ $cart }}
        </div>
    </div>
</div>
