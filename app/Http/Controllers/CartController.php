<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Add item to cart
    }

    public function removeFromCart(Request $request)
    {
        // Remove item from cart
    }

    public function updateQuantity(Request $request)
    {
        // Update quantity of item in cart
    }
}
