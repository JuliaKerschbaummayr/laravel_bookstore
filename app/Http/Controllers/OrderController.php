<?php

namespace App\Http\Controllers;

use App\Order;

class OrderController extends Controller
{
    public function index(int $userId) {
//        load all orders and relations with eager loading
        $orders = Order::where('user_id', $userId)->with(['user', 'books'])->get();
        return $orders;
    }

    public function orderById(string $id)
    {
        $order = Order::where('id', $id)->with(['user', 'books.orders', 'books.images', 'books.authors', 'statuses'])->first();
        return $order;
    }

    public function getAllOrders()
    {
        $allOrders = Order::with(['user', 'books'])->get();
        return $allOrders;
    }
}
