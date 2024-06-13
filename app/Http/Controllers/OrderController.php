<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::with('user', 'orderItems.makanan')->get();

        return view('orderList', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::with('user', 'orderItems.makanan')->findOrFail($id);
        $totalHarga = 0;
        foreach ($order->orderItems as $item) {
            $totalHarga += $item->makanan->harga * $item->kuantiti;
        }
        return view('orderDetail', compact('order', 'totalHarga'));
    }

    public function updateStatusToProses($id)
    {
        $order = Order::findOrFail($id);

 
        $order->status = 'proses';
        $order->save();

        return redirect()->route('orderList')->with('success', 'Order berhasil diambil.');
    }

    public function updateStatusToBatal($id)
    {
        $order = Order::findOrFail($id);

 
        $order->status = 'dibatalkan';
        $order->save();

        return redirect()->route('orderList')->with('success', 'Order berhasil dibatalkan.');
    }
}
