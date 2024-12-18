<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateProduct extends Component
{
    public $name;
    public $stock;
    public $productId;
    public $updateMode = false;


    //edit attribute
    #[On('product-edit')]
    //edit method
    public function edit($id){
        $product = Product::findOrFail($id);
        $this->name = $product->name;
        $this->stock = $product->stock;
        $this->productId = $product->id;

        $this->updateMode = true;
    
    }

    //update attribute
    #[On('product-update')]
    //update method
    public function update(){

        $validatedData =  $this->validate([
            'name' => 'required|min:3',
            'stock' => 'required',
        ]);

        $product = Product::findOrFail($this->productId);

        $product->update($validatedData);
    
        return redirect()->route('products');
    }

    //reset form attribute
    #[On('product-reset')]
    //reset form method
    public function resetForm(){
        $this->reset();
    }

    //delete attribute
    #[On('product-delete')]
    //delete method
    public function delete($id){
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('products');

    }
    
    #[On('delete-selection')]
    public function deleteSelection($ids){
        Product::whereIn('id', $ids)->delete();
        return redirect()->route('products');
    }

    //create product method
    public function save(){
        $validatedData =  $this->validate([
            'name' => 'required|min:3',
            'stock' => 'required',

        ]);

        Product::create($validatedData);

        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
