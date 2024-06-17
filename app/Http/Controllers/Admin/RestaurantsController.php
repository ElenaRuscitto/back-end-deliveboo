<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Functions\Helper as Help;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantRequest;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Controllo se l'utente è autenticato
        $user = Auth::user();

        // Prendo il ristorante associato all'utente
        $restaurant = Restaurant::where('user_id', $user->id)->first();

        // Controlla se l'utente ha un ristorante associato
        //TODO: dare possibilità di creazione se il ristorante non esiste
        if (!$restaurant) {
            return view('admin.restaurants.create');
        }

        // Vado alla visualizzazione del ristorante associato all'user
        return view('admin.restaurants.index', compact('restaurant', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ? Prendo l'user
        // $user = Auth::user();
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        //% Prendo l'utente loggato
        $user = Auth::user();
        $form_data = $request->all();
        $new_restaurant = new Restaurant();

        $form_data['slug'] = Help::createSlug($form_data['name'], Restaurant::class);

        //? Riempio il nuovo ristorante e lo salvo
        $new_restaurant->fill($form_data);
        $new_restaurant->user_id = $user->id;
        $user->restaurant_id = $new_restaurant->id;

        $new_restaurant->save();
        return redirect()->route('admin.restaurants.index')->with('success', 'Ristorante aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::with('dishes')->findOrFail($id);
        return view('admin.restaurants.dishesRestaurant', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $form_data = $request->all();

        if($form_data['name'] === $restaurant->name){
            $form_data['slug'] = $restaurant->slug;
        }else{
            $form_data['slug'] = Help::createSlug($form_data['name'], Restaurant::class);
        }

        $restaurant->update($form_data);

        return redirect()->route('admin.restaurants.index', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
