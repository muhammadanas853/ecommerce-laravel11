<div>
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>${{ $product->price }}</p>

    <form action="{{ url('/cart') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="quantity" value="1">
        <button type="submit">Add to Cart</button>
    </form>
</div>

<div>
    <h2>Reviews</h2>
    @foreach($product->reviews as $review)
        <div>
            <p>{{ $review->review }}</p>
            <p>Rating: {{ $review->rating }}/5</p>
        </div>
    @endforeach

    <form action="{{ url('/products/' . $product->id . '/reviews') }}" method="POST">
        @csrf
        <textarea name="review"></textarea>
        <input type="number" name="rating" max="5">
        <button type="submit">Submit Review</button>
    </form>
</div>
