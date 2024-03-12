<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    // Store the cart item
    public function submitCheckout(Request $request)
    {
        // Validate the request data
        $request->validate([
            'telp' => 'required',
            'alamat' => 'required',
            'buktitransfer' => 'required|file|max:2048|mimes:jpeg,png,svg',
            'catatan' => 'required',
        ]);
    
        // Get the user's cart
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        // dd($cart);

        // Check if the cart exists and has items
        if (!$cart || $cart->items->isEmpty()) {
            // Handle the case when the cart does not exist or does not have items
            return redirect()->back()->withErrors(['cart' => 'Your cart is empty.']);
        }
    
        // Calculate the total price of the cart items
        $total_price = $cart->items->sum(function ($item) {
            // dd($item->product);
            return $item->product->harga * $item->quantity;
        });
    
        // Store the transfer proof image and get its path
        $buktitransferPath = $request->file('buktitransfer')->store('buktitransfer', 'public');
        
        // dd($request->nama);

        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'email' => $request->email,
            'username' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'buktitransfer' => $buktitransferPath,
            'status' => 'pending',
            'catatan' => $request->catatan,
            'total_price' => $total_price,
        ]);
    
        // Attach the cart items to the order
        foreach ($cart->items as $item) {
            $order->products()->attach($item->produk_id, ['quantity' => $item->quantity]);
        }
    
        // Delete the user's cart items
        $cart->items()->delete();
    
        // Redirect the user to a success page
        return redirect()->route('chart');
    }

    // Show the order success page
    public function markOrderDone($orderId)
    {
        // Retrieve the order
        $order = Order::findOrFail($orderId);

        // Update the order status
        $order->update(['status' => 'done']);

        // Redirect the admin back to the dashboard
        return redirect()->route('chart');
    }

    // public function OrderSuccess(Request $request)
    // {
    //     return view('order.OrderSuccess');    
    // }
}
