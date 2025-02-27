<div class="">
    {{-- Do your work, then step back. --}}
    <livewire:hero/>
    <livewire:components.category-section/>

    @role('admin')
     <p>ADMIN</p>
    
    @endrole
    <p>{{ Auth::user()->roles ->pluck('name') }}</p>
    <livewire:components.product-section/>

</div>
