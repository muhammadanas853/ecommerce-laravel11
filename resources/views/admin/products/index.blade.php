@extends('layouts.app')

@section('content')
<h1>Product List</h1>
<a href="{{ route('admin.products.create') }}">Add New Product</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

