<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
// use App\Functions\Helper as Help;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(session('restaurant_id'));
        // $this->authorize('view', $restaurant);
        // dd($restaurant);
        return view('admin.dishes.create');
    }
    //  */
    // public function create(Restaurant $restaurant)
    // {
    //     dd(session('restaurant_id'));

    //     $this->authorize('view', $restaurant);
    //     // dd($restaurant);
    //     return view('admin.dishes.create', compact('restaurant'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        $form_data = $request->all();


        // verifico l'esistenza della chiave 'image' in $form_data
        if(array_key_exists('image', $form_data)) {
            // salvo immagine nello storage e ottengo il percorso
            $image_path = Storage::put('uploads', $form_data['image']);

            $original_image = $request->file('image')->getClientOriginalName();

            $form_data['image'] = $image_path;
            $form_data['original_image'] = $original_image;

        }




        $new_dish = new Dish();
        $new_dish -> fill($form_data);

        $new_dish->restaurant_id = session('restaurant_id');
        // dd($new_dish);
        $new_dish-> save();

        return redirect()->route('admin.show')->with('success', 'Piatto aggiunto');
        // return redirect()->route('admin.show', ['restaurant' => $restaurant->id])->with('success', 'Piatto aggiunto');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $restaurantId = session('restaurant_id');
        $restaurant = Restaurant::with('dishes')->findOrFail($restaurantId);

        if (!$restaurant->dishes->contains($dish->id)) {
            abort(404, 'Pagina non trovata');
        }

        $this->authorize('update', $restaurant);
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishRequest $request, Dish $dish)
    {

        $form_data = $request->all();
        // verifico l'esistenza della chiave 'image' in $form_data
        if(array_key_exists('image', $form_data)) {
           // salvo immagine nello storage e ottengo il percorso
           $image_path = Storage::put('uploads', $form_data['image']);

           $original_image = $request->file('image')->getClientOriginalName();

           $form_data['image'] = $image_path;
           $form_data['original_image'] = $original_image;

        }
        $dish -> update($form_data);

        // Aggiorna il prodotto con i dati validati
        $dish->update($request->all());
        // Reindirizza alla pagina di modifica con un messaggio di successo

        return redirect()->route('admin.show')->with('success', 'Piatto aggiornato');
    }

    public function destroy(Dish $dish)
    {

         $dish->delete();

       return redirect()->route('admin.show')
        ->with('success', 'Piatto eliminato con successo.');
    }
}
