@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <img 
            class="w-full h-60 object-cover rounded-lg" 
            src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}" 
            alt="{{ $product->nama_produk }}">
        <h1 class="text-2xl font-bold text-gray-900 mt-4">{{ $product->nama_produk }}</h1>
        <p class="text-gray-700 mt-2">{{ $product->description }}</p>
        <span class="text-primary font-bold text-xl mt-4 block">Rp. {{ $product->price }}</span>
    </div>
</div>
@endsection
