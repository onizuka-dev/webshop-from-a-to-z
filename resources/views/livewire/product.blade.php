<div class="grid grid-cols-2 gap-6 py-12">
    <div class="space-y-4 mr-5" x-data="{ image: '/{{ $this->product->image->path }}' }">
        <div class="flex bg-white p-6 rounded-lg shadow justify-center">
            <img x-bind:src="image" alt="">
        </div>

        <div class="grid grid-cols-4 gap-4 mt-4">
            @foreach($this->product->images as $image)
                <div class="rounded bg-white p-2 shadow">
                    <img @click="image = '/{{ $image->path }}'" src="/{{ $image->path }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <h1 class="text-3xl font-medium">{{ $this->product->name }}</h1>
        <div class="text-xl text-gray-700">{{ $this->product->price }}</div>

        <div class="mt-4">{{ $this->product->description }}</div>

        <div class="mt-4 space-y-4">
            <select wire:model="variant" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-800">
                @foreach($this->product->variants as $variant)
                    <option value="{{ $variant->id}}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            @error('variant')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror

            <x-button wire:click="addToCart" class="mt-4">Add to Cart</x-button>
        </div>
    </div>
</div>
