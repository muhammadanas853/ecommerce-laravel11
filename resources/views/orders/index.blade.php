<h1>Your Orders</h1>

@foreach($orders as $order)
    <div>
        <p>Order ID: {{ $order->id }}</p>
        <p>Total: ${{ $order->total }}</p>
    </div>
@endforeach
