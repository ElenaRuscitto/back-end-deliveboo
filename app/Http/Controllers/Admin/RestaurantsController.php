<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Functions\Helper as Help;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantRequest;
use App\Models\Type;
use App\Http\Controllers\Chart\ChartController;
use Illuminate\Support\Facades\Storage;
class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Controllo se l'utente è autenticato
        $user = Auth::user();
        if($user){
            // Prendo il ristorante associato all'utente
            $restaurant = Restaurant::where('user_id', $user->id)->first();
            if($restaurant != null){
                session(['restaurant_id' => $restaurant->id]);

            }

            // Prelevo tutti i tipi di ristoranti
            $types = Type::orderBy('name')->get();

            // Controlla se l'utente ha un ristorante associato
            if (!$restaurant) {
                $types = Type::orderBy('name')->get();
                return view('admin.restaurants.create',compact('types'));
            }
            //!Autorizzazione alla rotta
            $this->authorize('view', $restaurant);

              // Use ChartController to get chart data
              $chartController = new ChartController();
              $chartData = $chartController->getChartData();
            // dd($chartData);

            // Vado alla visualizzazione del ristorante associato all'user
            return view('admin.restaurants.index', $chartData, compact('restaurant', 'user', 'types'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ? Prendo l'user
        // $user = Auth::user();
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RestaurantRequest $request)
    {
        //% Prendo l'utente loggato
        $user = Auth::user();
        $form_data = $request->all();


        // verifico l'esistenza della chiave 'image' in $form_data
        if(array_key_exists('image', $form_data)) {

            if($request->hasFile('image')) {
                $image_path = Storage::put('uploads', $request->file('image'));

                $form_data['image'] = $image_path;
            }

            // salvo immagine nello storage e ottengo il percorso
            // $image_path = Storage::put('uploads', $form_data['image']);
            // $original_image = $request->file('image')->getClientOriginalName();

            // $form_data['image'] = $image_path;
            // $form_data['original_image'] = $original_image;

        }

        $new_restaurant = new Restaurant();
        $form_data['slug'] = Help::createSlug($form_data['name'], Restaurant::class);
        //? Riempio il nuovo ristorante e lo salvo
        $new_restaurant->fill($form_data);
        $new_restaurant->user_id = $user->id;
        $user->restaurant_id = $new_restaurant->id;
        $new_restaurant->save();
        $new_restaurant->types()->attach($form_data['types']);



        return redirect()->route('admin.home')->with('success', 'Ristorante aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $restaurantId = session('restaurant_id');
        $myRestaurant = Restaurant::with('dishes')->findOrFail($restaurantId);
        $this->authorize('view', $myRestaurant);
        return view('admin.restaurants.dishesRestaurant', compact('myRestaurant'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        //!Autorizzazione alla rotta
        $this->authorize('update', $restaurant);
        $types = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        //!Autorizzazione alla rotta
        $this->authorize('update', $restaurant);
        $form_data = $request->all();

        if($form_data['name'] === $restaurant->name){
            $form_data['slug'] = $restaurant->slug;
        }else{
            $form_data['slug'] = Help::createSlug($form_data['name'], Restaurant::class);
        }

        // verifico l'esistenza della chiave 'image' in $form_data
        if(array_key_exists('image', $form_data)) {
            // salvo immagine nello storage e ottengo il percorso
            $image_path = Storage::put('uploads', $form_data['image']);

            $form_data['image'] = $image_path;

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
