@extends('layouts.app')

@section('content')
    <div class="max-w-[1280px] mx-4 md:mx-auto">
        <h1 class="mb-5">Hello, welcome to laravel app crud</h1>
        <div class="mx-auto">
            @livewire('partials.product-counter')
        </div>
    </div>
@endsection