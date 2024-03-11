<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{

    public function cart()
    {
        // Get the current user's cart
        $cart = Cart::where('user_id', auth()->id())->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->get();
        // echo $cartItems;
        $user = Auth::user(); // Get the currently authenticated user
        return view('Chart')->with([
            'cartItems' => $cartItems,
            'user' => $user
        ]);
    }
    public function addToCart(Request $request)
    {
        // Find or create a cart for the current user
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Find or create a cart item for the specified product
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
        ]);

        // If the cart item is new, set the quantity to 1
        if ($cartItem->quantity == null) {
            $cartItem->quantity = 1;
        } else {
            // Otherwise, increment the quantity of the cart item
            $cartItem->increment('quantity');
        }

        // Save the cart item
        $cartItem->save();

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    // Update the quantity of a cart item
    public function updateQuantity($id, Request $request)
    {
        $cartItem = CartItem::find($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    
        return response()->json(['success' => true]);
    }

    // Remove item from cart
    public function removeFromCart($id)
    {
        $cartItem = CartItem::find($id);
        $cartItem->delete();
    
        return response()->json(['success' => true]);
    }


}
