@extends('layouts.app')

@section('content')
<h1>Create Product</h1>
<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" required>
    <button type="submit">Create Product</button>
</form>
@endsection
