<div class="flex flex-col w-64 border-10 space-y-1 transition duration-300 ease-in-out transform hover:scale-105 rounded-md" >
    <div wire:click="gotoPage"><img class="rounded-t-md " src="{{asset( $product->img_url) ?? 'https://picsum.photos/300/600'   }}" alt=""></div>
<div class="text-lg pl-2">{{ $product->name}}</div>
<div class=" pl-2 text-orange-400 font-semibold text-xl">Php. {{ $product->price   }}</div>
<div>
    <button class="bg-yellow-400 w-full mt-2 text-white px-4 py-2 hover:bg-yellow-700 rounded-lg " wire:click="addTocart">Add to cart</button>
</div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
