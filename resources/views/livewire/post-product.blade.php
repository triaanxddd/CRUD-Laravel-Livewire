<div>
    <div class="grid grid-cols-6 my-2">
        <div class="col-start-1 col-end-3">
            <button class="py-1 px-2 bg-red-400 rounded text-white font-bold disabled:bg-red-300 " {{ !$productSelectionId  ? 'disabled' : '' }}
                wire:click="deleteSelection('')" 
                wire:confirm="Are you sure want to delete {{ count($productSelectionId) }} items?">
                Delete : {{ count($productSelectionId) }}
            </button>
        </div>
        <div class="col-end-5 md:col-end-8 col-span-2">
            <input type="text" wire:model.live="searchName" class="py-1 px-3 border-2 w-auto rounded border-slate-400" placeholder="Find Product">
        </div>
    </div>

    <div class="flex flex-col overflow-x-auto">
        <div class="">
            <div class="">

                <table class="rounded table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr >
                            <th scope="col" class="px-2 py-3 text-center">
                                <input type="checkbox" name="check_all" id="check_all" value="1" wire:model="selectAll" wire:click='updateSelectAll()'>
                            </th>
                            <th scope="col" class="px-2 py-3">#</th>
                            <th scope="col" class="px-6 py-3 hover:bg-gray-600" wire:click="sort('name')">Name</th>
                            <th scope="col" class="px-6 py-3">Stock</th>
                            <th scope="col" class="px-6 py-3 hover:bg-gray-600" wire:click="sort('created_at')">Created</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)                        
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-600">
                                <td class="text-center"> 
                                    <input type="checkbox" value="{{ $product->id }}" id="check_{{ $product->id }}"
                                    {{ $selectAll ? 'checked' : '' }}
                                    wire:model.live="productSelectionId" 
                                    wire:key="{{ $product->id }}">
                                </td>
                                <td>
                                    <label for="check_{{ $product->id }}">
                                        {{ $loop->iteration + $products->firstItem() - 1  }}
                                    </label>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="flex">
                                        <a href="#form_section">
                                            <button wire:click="edit({{ $product->id }})" class="px-2 py-1 mx-1 bg-orange-400 rounded-md text-white">
                                                Edit
                                            </button>
                                        </a>
                                        <button wire:confirm="Are you sure you want to delete this product?" wire:click="$dispatch('product-delete', {id:{{ $product->id }}})" type="submit" class="px-2 py-1 bg-red-400 rounded-md text-white">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $products->links() }}

    <div>
        <select name="paginate" id="paginate" class="border-2 border-slate-400 rounded mt-2" wire:model.live="selectPaginate">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div>
