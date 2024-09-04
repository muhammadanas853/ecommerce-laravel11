@foreach($products as $product)
    <div>
        <a href="{{ url('/products/' . $product->id) }}">{{ $product->name }}</a>
        <p>{{ $product->description }}</p>
        <p>${{ $product->price }}</p>
    </div>
@endforeach
