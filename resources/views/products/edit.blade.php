@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Code</label>
            <input name="code" class="form-control" value="{{ old('code', $product->code) }}">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input name="model" class="form-control" value="{{ old('model', $product->model) }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input name="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>

        <div class="mb-3">
            <label>Photo</label><br>
            @if($product->photo)
                <img src="{{ asset('storage/'.$product->photo) }}" width="100" alt="">
            @endif
            <input type="file" name="photo" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
