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
         return response()->json($restaurants);
    }
    public function getTypes(){
        $types = Type::all();
        return response()->json($types);
    }
    public function getRestaurantInfo($id){
        $restaurant = Restaurant::where('id', $id)->with('types', 'dishes')->first();
        return response()->json($restaurant);
    }
    public function getRestaurantsByType($type)
    {
        $typeModel = Type::where('name', $type)->first();



        $restaurants = $typeModel->restaurants()->with('types')->get();

        return response()->json($restaurants);
    }

}
