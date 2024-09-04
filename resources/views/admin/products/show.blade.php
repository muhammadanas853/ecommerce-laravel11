@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>${{ $product->price }}</p>
<p>Stock: {{ $product->stock }}</p>
<a href="{{ route('admin.products.edit', $product) }}">Edit</a>
@endsection
