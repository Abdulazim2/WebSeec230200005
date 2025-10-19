@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Product</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Code</label>
            <input name="code" class="form-control" value="{{ old('code') }}">
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input name="model" class="form-control" value="{{ old('model') }}">
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
