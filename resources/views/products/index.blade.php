@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center">Product List</h1>
    <div class="max-w-[1280px] md:mx-auto mx-3">
        @livewire('create-product')
        @livewire('post-product')
    </div>
@endsection