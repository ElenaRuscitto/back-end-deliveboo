<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Dish;


class OrdersController extends Controller
{
    public function index()
    {
        $restaurantId = session('restaurant_id');
        $restaurant = Restaurant::with('dishes.orders')->findOrFail($restaurantId);

        // Get all orders related to the restaurant's dishes
        $orders = $restaurant->dishes->flatMap->orders->unique('id');

        return view('admin.orders.index', compact('restaurant', 'orders'));
    }
    public function show(Order $order)
    {
        $dishes =  $order->dishes()->get();

        // TODO: ristorante può vedere solo i propri ordini

        return view('admin.orders.show', compact('order', 'dishes'));
    }

}
