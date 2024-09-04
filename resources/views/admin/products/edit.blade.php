@extends('layouts.app')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('admin.products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required>{{ $product->description }}</textarea>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
    <button type="submit">Update Product</button>
</form>
@endsection
