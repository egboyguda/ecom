<div class=" shadow-md p-4">
<div class="flex justify-between mx-auto container">
    {{-- Do your work, then step back. --}}
    <div>
     <a wire:navigate href="/">Papalit</a> 
    </div>
    <div class="flex-2">
      <input type="text" class="border-2 w-full border-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Search">
    </div>
    <div>
        cart {{ $total }}
</div>
</div>

</div>