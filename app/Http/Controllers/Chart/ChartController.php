<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;


class ChartController extends Controller
{

public function chart()
{
    $restaurantId = session('restaurant_id');

    // Ensure the restaurant exists
    $restaurant = Restaurant::findOrFail($restaurantId);

    // Retrieve order statistics grouped by day, ordered by date ascending
    $statistics = Order::whereHas('dishes', function($query) use ($restaurantId) {
        $query->where('restaurant_id', $restaurantId);
    })
    ->selectRaw('DATE(created_at) as date, SUM(tot) as total_sales, COUNT(*) as total_orders')
    ->groupBy('date')
    ->orderBy('date', 'asc') // Change to ascending order
    ->get();

    // Pass the data to the view
    return view('chart.index', compact('restaurant', 'statistics'));
}
public function getChartData()
{
    $restaurantId = session('restaurant_id');

    // Ensure the restaurant exists
    $restaurant = Restaurant::findOrFail($restaurantId);

    // Retrieve order statistics grouped by day, ordered by date ascending
    $statistics = Order::whereHas('dishes', function($query) use ($restaurantId) {
        $query->where('restaurant_id', $restaurantId);
    })
    ->selectRaw('DATE(created_at) as date, SUM(tot) as total_sales, COUNT(*) as total_orders')
    ->groupBy('date')
    ->orderBy('date', 'asc') // Change to ascending order
    ->get();

    // Pass the data to the view
    return compact( 'statistics');
}
}
