<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\Dish;

class RestaurantController extends Controller
{
    //? Mi Restituisce tutti i ristoranti
    public function index(){
        $restaurants = Restaurant::with('types')->get();
        $response = [
            'total_results' => $restaurants->count(),
            'restaurants' => $restaurants
        ];

        return response()->json($response);

    }

//? Mi Restituisce tutti i tipi di ristorante
    public function getTypes(){
        $types = Type::all();
        $response = [
            'total_results' => $types->count(),
            'types' => $types
        ];

        return response()->json($response);

    }

//? Mi Restituisce tutte le info del ristorante per id
    public function getRestaurantInfo($id){
        $restaurant = Restaurant::where('id', $id)->with('types', 'dishes')->first();
        return response()->json($restaurant);
    }

    //? Mi Restituisce tutti i ristoranti filtrati per tipo
    public function getRestaurantsByType(Request $request)
    {
        $types = explode(',', $request->input('types', ''));

        if(empty($types) || (count($types)=== 1 && $types[0] === '')){
            return response()->json([
                'total_result' => 0,
                'restaurant' => []
            ]);
        }

        //* Faccio la chiamata al db per i ristoranti che appartengono a questi tipi
        $restaurants = Restaurant::whereHas('types', function($query) use ($types){
            $query->whereIn('name', $types);
        }, '=', count($types))->with('types')->get();

        $response = [
            'total_result' => $restaurants->count(),
            'restaurant' => $restaurants
        ];

        return response()->json($response);
    }

    //? Mi Restituisce tutti i ristoranti che ho cercato con la search bar
    public function getSearchRestaurants($search)
    {
        $typeModel = Type::where('name', 'like', '%' . $search . '%')->first();
        $restaurantQuery = Restaurant::where('name', 'like', '%' . $search . '%')->with('types', 'dishes');

        if ($typeModel) {
            $restaurantsByType = $typeModel->restaurants()->with('types', 'dishes')->get();
        }else {
            $restaurantsByType = collect();
        }
            $restaurantsByName = $restaurantQuery->get();
            $restaurants = $restaurantsByType->merge($restaurantsByName)->unique('id');

            $response = [
                'total_results' => $restaurants->count(),
                'restaurants' => $restaurants
            ];

        return response()->json($response);
    }

}
