@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary mb-4">Add New User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <button class="btn btn-success w-100">Save</button>
    </form>
</div>
@endsection
