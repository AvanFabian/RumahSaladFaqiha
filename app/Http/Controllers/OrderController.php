<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\History;
use App\Models\InfoToko;

class OrderController extends Controller
{
    // Store the cart item
    public function submitCheckout(Request $request)
    {
        // Validate the request data
        $request->validate([
            'telp' => 'required',
            'alamat' => 'required',
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
    
        // Create a new order
        $order = Order::create([
            'user_id' => auth()->id(),
            'email' => $request->email,
            'username' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'status' => 'pending',
            'catatan' => $request->catatan,
            'total_price' => $total_price,
        ]);
    
        // Attach the cart items to the order
        foreach ($cart->items as $item) {
            $order->products()->attach($item->product_id, ['quantity' => $item->quantity]);
        }
    
        // Delete the user's cart items
        // $cart->items()->delete();

        // Create a new history
        // foreach ($cart->items as $item) {
        //     History::create([
        //         'user_id' => auth()->id(),
        //         'product_id' => $item->product_id,
        //         'quantity' => $item->quantity,
        //     ]);
        //     $item->delete();
        // }
    
        // Format the message
        $message = "Halo, aku mau pesan, Order ID: {$order->id}. ";

        // Format the WhatsApp URL
        $toko = InfoToko::first();
        $whatsAppNumber = $toko->no_whatsapp;
        $whatsAppUrl = 'https://wa.me/' . $whatsAppNumber . '?text=' . urlencode($message);

        // Redirect to the WhatsApp URL
        return redirect($whatsAppUrl);

        // Redirect to the history page
        // return redirect()->route('history.index')->with([
        //     'whatsAppUrl' => $whatsAppUrl,
        //     'message' => 'Order submitted successfully. Click the button below to send a WhatsApp message to the seller.',
        // ]);

    }

    // Show the order success page
    public function markOrderDone($orderId)
    {
        // Retrieve the order
        $order = Order::findOrFail($orderId);

        // Update the order status
        $order->update(['status' => 'done']);

        // Redirect the admin back to the dashboard
        return redirect()->route('admin.dashboard')->with('success', 'Order marked as done.');
    }

}
