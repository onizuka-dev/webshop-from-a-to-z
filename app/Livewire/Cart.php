<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)->increment('quantity');
        $this->dispatch('cartUpdated');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);

        if ($item->quantity <= 1) {
            return;
        }

        $item->decrement('quantity');
        $this->dispatch('cartUpdated');
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
