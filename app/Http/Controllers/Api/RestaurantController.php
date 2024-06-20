<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\Dish;

class RestaurantController extends Controller
{
    public function index(){
         $restaurants = Restaurant::with('types')->get();
         $response = [
            'total_results' => $restaurants->count(),
            'restaurants' => $restaurants
        ];

        return response()->json($response);

    }
    public function getTypes(){
        $types = Type::all();
        $response = [
            'total_results' => $types->count(),
            'types' => $types
        ];

        return response()->json($response);

    }
    public function getRestaurantInfo($id){
        $restaurant = Restaurant::where('id', $id)->with('types', 'dishes')->first();
        return response()->json($restaurant);
    }
    public function getRestaurantsByType($type)
    {
        $typeModel = Type::where('name', $type)->first();

        $restaurants = $typeModel->restaurants()->with('types')->get();

        $response = [
            'total_results' => $restaurants->count(),
            'restaurants' => $restaurants
        ];

        return response()->json($response);
    }
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
