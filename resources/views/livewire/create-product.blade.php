<div class="" id="form_section">
    <form wire:submit='{{ !$updateMode ? "save" : "update" }}' class="{{ !$updateMode ? '' : 'bg-orange-400'}} py-2 px-1 rounded">
        <div class="relative z-0 w-full mb-5 group">
            <input wire:model="name" type="name" name="name" id="name" class="form-input text-gray-800 peer" placeholder=" " required />
            <label for="name" class="form-label">Name</label>
            <div>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input wire:model="stock" type="number" name="stock" id="stock" class="form-input text-gray-800 peer" placeholder=" " required />
            <label for="stock" class="form-label">Stock</label>
            <div>
                @error('stock') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="py-1 px-2  {{ !$updateMode ? 'bg-green-400' : 'bg-sky-400' }}  rounded text-white font-bold" type="submit">
            {{ !$updateMode ? 'Add' : 'Update' }}
        </button>
        <button wire:click="resetForm()" class="py-1 px-2 bg-red-400 rounded text-white font-bold" type="reset">Reset</button>
    </form>
</div>
