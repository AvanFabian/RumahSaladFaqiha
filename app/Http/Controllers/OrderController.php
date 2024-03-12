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
            'buktitransfer' => 'required|file|mimes:jpeg,png|max:2048',
            'catatan' => 'required',
        ]);

        // Get the user's cart
        $cart = Cart::where('user_id', auth()->id())->first();

        // Calculate the total price of the cart items
        $total_price = $cart->items->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });

        // Store the transfer proof image and get its path
        $buktitransferPath = $request->file('buktitransfer')->store('buktitransfer', 'public');

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

        // dd($order);

        // Delete the user's cart items
        $cart->items()->delete();

        // Redirect the user to a success page
        return redirect()->route('order.OrderSuccess');
    }

    // Show the order success page
    public function markOrderDone($orderId)
    {
        // Retrieve the order
        $order = Order::findOrFail($orderId);

        // Update the order status
        $order->update(['status' => 'done']);

        // Redirect the admin back to the dashboard
        return redirect()->route('admin.dashboard');
    }

    public function sendOrderDetails(Request $request)
    {
        // Send order details to seller's WhatsApp number
    }
}
