<div class="mx-auto container">
    <h1 class="text-3xl font-semibold text-slate-700 my-4">Product</h1>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($products as $product)
            <livewire:components.product-card :key="$product->id" :product="$product" />
        @endforeach
    </div>
    <div class="mt-6">
    {{ $products->links() }} 
    </div>
   
</div>