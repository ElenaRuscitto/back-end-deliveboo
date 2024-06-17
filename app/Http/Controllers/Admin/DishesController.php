<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Models\Restaurant;

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

         return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        $form_data = $request->all();
            $new_dish = new Dish();
            $new_dish -> fill($form_data);

            $new_dish-> save();

            return redirect()->route('admin.dishes.index')->with('success', 'Piatto aggiunto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        dd($restaurant);
        //   return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
         return view( 'admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishRequest $request, Dish $dish)
    {

    $form_data = $request->all();
        $dish -> update($form_data);


    // Aggiorna il prodotto con i dati validati
    //$dish->update($request->all());

    // Reindirizza alla pagina di modifica con un messaggio di successo
    return redirect()->route('admin.dishes.index', $dish)->with('success', 'Piatto aggiornato');
    }

    public function destroy(Dish $dish)
    {
         $dish->delete();

       return redirect()->route('admin.dishes.index')
        ->with('success', 'Piatto eliminato');
    }
}
