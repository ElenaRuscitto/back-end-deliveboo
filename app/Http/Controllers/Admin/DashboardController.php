<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Http\Controllers\Admin\RestaurantsController;

class DashboardController extends Controller
{
    public function index () {

        // Controllo se l'utente è autenticato
        $user = Auth::user();

        // Prendo il ristorante associato all'utente
        $restaurant = Restaurant::where('user_id', $user->id)->first();


        if(!$restaurant) {
            return view('admin.restaurants.create');
        }

        return view ('admin.restaurants.index', compact('restaurant', 'user'));
    }
}
