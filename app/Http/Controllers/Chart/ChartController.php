<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;


class ChartController extends Controller
{
    // public function chart()
    // {
    //      $restaurantId = session('restaurant_id');

    //      // Assicuriamoci che il ristorante esista
    //      $restaurant = Restaurant::findOrFail($restaurantId);

    //      // Ottieni le statistiche degli ordini raggruppati per mese e anno
    //      $statistics = Order::whereHas('dishes', function($query) use ($restaurantId) {
    //          $query->where('restaurant_id', $restaurantId);
    //      })
    //      ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(tot) as total_sales, COUNT(*) as total_orders')
    //      ->groupBy('year', 'month')
    //      ->orderBy('year', 'desc')
    //      ->orderBy('month', 'desc')
    //     ->get();
    //     // dd($statistics);
    //      return view('chart.index', compact('restaurant', 'statistics'));

    // }
//     public function chart()
// {
//     $restaurantId = session('restaurant_id');

//     // Assicuriamoci che il ristorante esista
//     $restaurant = Restaurant::findOrFail($restaurantId);

//     // Ottieni le statistiche degli ordini raggruppati per giorno
//     $statistics = Order::whereHas('dishes', function($query) use ($restaurantId) {
//         $query->where('restaurant_id', $restaurantId);
//     })
//     ->selectRaw('DATE(created_at) as date, SUM(tot) as total_sales')
//     ->groupBy('date')
//     ->orderBy('date', 'desc')
//     ->get();

//     return view('chart.index', compact('restaurant', 'statistics'));
// }
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
}
