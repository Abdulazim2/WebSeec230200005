@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card mb-3 p-3">
        <p><strong>Code:</strong> {{ $product->code }}</p>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Model:</strong> {{ $product->model }}</p>
        <p><strong>Price:</strong> {{ $product->price }} EGP</p>

        @if($product->photo)
            <p><strong>Photo:</strong></p>
            <img src="{{ asset('storage/'.$product->photo) }}" width="200" alt="Product photo">
        @endif

        <p class="mt-3"><strong>Description:</strong></p>
        <p>{{ $product->description }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
