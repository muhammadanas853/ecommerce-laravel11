<h1>Your Cart</h1>

@foreach($cartItems as $item)
    <div>
        <p>{{ $item->product->name }}</p>
        <p>Quantity: {{ $item->quantity }}</p>
        <p>Total: ${{ $item->product->price * $item->quantity }}</p>
    </div>
@endforeach

<form action="{{ url('/checkout') }}" method="POST">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="{{ $cartItems->sum('product.price') * 100 }}"
        data-name="E-commerce Site"
        data-description="Order Total"
        data-image=""
        data-locale="auto">
    </script>
</form>
