<div class="my-2 w-[50%] md:w-[25%] ">
    <a href="{{ route('products') }}">
        <div class=" bg-slate-400 rounded py-3 px-3 text-3xl font-bold text-white">
            <span>Total Product :</span>
            <div class="text-center" wire:poll>
                {{ $product_count }}
            </div>
        </div>
    </a>
</div>
