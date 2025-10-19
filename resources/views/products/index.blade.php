@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead><tr><th>#</th><th>Code</th><th>Name</th><th>Price</th><th>Photo</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->code }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->price }}</td>
                <td>
                    @if($p->photo)
                        <img src="{{ asset('storage/'.$p->photo) }}" alt="photo" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.show', $p) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $p) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
