<x-nav-link href="#" :active="request()->routeIs('home')">
    {{ __('Your cart') }} ({{ $this->count }})
</x-nav-link>
