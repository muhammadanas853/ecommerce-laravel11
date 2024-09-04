<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => $request->total * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Order from E-commerce site',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $request->total,
        ]);

        Cart::where('user_id', auth()->id())->delete();

        return redirect('/orders');
    }
}
