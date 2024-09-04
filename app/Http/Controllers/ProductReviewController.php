<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, $product)
    {
        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $product,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return back();
    }
}
