<?php

namespace App\Livewire\Partials;

use App\Models\Product;
use Livewire\Component;

class ProductCounter extends Component
{
    public function render()
    {
        $product_count = Product::count();

        return view('livewire..partials.product-counter', compact('product_count'));
    }
}
