<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index () {

        // Controllo se l'utente è autenticato
        $user = Auth::user();

        // Prendo il ristorante associato all'utente
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $types = Type::all();


        if(!$restaurant) {
            $types = Type::all();

            return view('admin.restaurants.create', compact('types'));
        }

        return view ('admin.restaurants.index', compact('restaurant', 'user', 'types'));
    }
}
