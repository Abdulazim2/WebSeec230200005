@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Product Catalog</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text text-muted">{{ $product['description'] }}</p>
                    <p class="fw-bold text-success">{{ $product['price'] }} EGP</p>
                    <button class="btn btn-outline-primary w-100">Add to Cart 🛒</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
