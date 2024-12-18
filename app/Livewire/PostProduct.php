<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class PostProduct extends Component
{
    use WithPagination;
    public $searchName = '';
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $selectPaginate = 25;
    public $productSelectionId = [];
    public $selectAll = false;
    
    public function updateSelectAll(){
        if($this->selectAll){
            $this->productSelectionId = Product::pluck('id');
        } else {
            $this->productSelectionId = [];
        }
    }

    public function edit($id){
        $this->dispatch('product-edit', $id);
    }

    public function update(){
        $this->dispatch('product-update');
    }

    public function deleteSelection(){
        $this->dispatch('delete-selection', $this->productSelectionId);
    }

    public function sort($columnName){
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $productsQuery = Product::orderBy($this->sortColumn, $this->sortDirection);

        if($this->searchName){
            $productsQuery->where('name', 'like', '%' . $this->searchName . '%');
        }

        $products = $productsQuery->paginate($this->selectPaginate);

        return view('livewire.post-product', compact('products'));
    }
}
