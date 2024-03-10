<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Display checkout form
    }

    public function submitCheckout(Request $request)
    {
        // Submit checkout form
    }

    public function sendOrderDetails(Request $request)
    {
        // Send order details to seller's WhatsApp number
    }
}
