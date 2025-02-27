<div class="">
    {{-- Do your work, then step back. --}}
    <livewire:hero/>
    <livewire:components.category-section/>

    @if (Auth::user()->hasRole('admin'))
     <p>ADMIN</p>
    
    @endif
    <livewire:components.product-section/>

</div>
