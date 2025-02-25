<div class="flex flex-col w-64 border border-gray-300 shadow-lg rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 bg-white">
    <!-- Image Container -->
    <div wire:click="gotoPage" class="cursor-pointer">
        <img class="w-full h-48 object-cover" src="{{ asset($product->img_url) ?? 'https://picsum.photos/300/600' }}" alt="">
    </div>

    <!-- Product Details -->
    <div class="p-4">
        <div class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</div>

        <!-- Static Rating -->
        <div class="flex items-center space-x-1 text-yellow-400 mt-1">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>

        <!-- Price -->
        <div class="text-orange-500 font-bold text-xl mt-1">Php {{ number_format($product->price, 2) }}</div>

        <!-- Add to Cart Button -->
        <button 
            class="mt-4 w-full bg-yellow-500 text-white font-semibold px-4 py-2 rounded-lg transition duration-300 hover:bg-gradient-to-r hover:from-yellow-500 hover:to-yellow-700"
            wire:click="addTocart">
            Add to Cart
        </button>
    </div>
</div>
