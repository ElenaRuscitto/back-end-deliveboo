<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('it_IT');
        $today = Carbon::now();
        $oneYearAgo = Carbon::now()->subYear();
        $numberOfOrders = 2000; // Numero di ordini da creare
        $maxDishesPerOrder = 4; // Numero massimo di piatti per ordine

        // Ottieni tutti i ristoranti
        $restaurants = DB::table('restaurants')->pluck('id');

        for ($i = 0; $i < $numberOfOrders; $i++) {
            $orderDate = $faker->dateTimeBetween($oneYearAgo, $today);

            // Seleziona un ristorante casualmente
            $restaurantId = $faker->randomElement($restaurants);

            // Ottieni i piatti di quel ristorante
            $restaurantDishes = DB::table('dishes')
                ->where('restaurant_id', $restaurantId)
                ->pluck('id');

            // Seleziona casualmente i piatti per l'ordine
            $orderDishes = $faker->randomElements($restaurantDishes, rand(1, $maxDishesPerOrder));
            $orderTotal = 0;

            // Crea l'ordine
            $orderId = DB::table('orders')->insertGetId([
                'name' => $faker->name,
                'code' => $faker->unique()->numerify('ORD-####'),
                'address' => $faker->address,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'tot' => 0, // Sarà aggiornato dopo l'inserimento dei piatti
                'desc' => '',
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Aggiungi i piatti all'ordine
            foreach ($orderDishes as $dishId) {
                $quantity = rand(1, 5);
                $dishPrice = DB::table('dishes')->where('id', $dishId)->value('price');
                $orderTotal += $dishPrice * $quantity;

                DB::table('dish_order')->insert([
                    'order_id' => $orderId,
                    'dish_id' => $dishId,
                    'quantity' => $quantity,
                ]);
            }

            // Aggiorna il totale dell'ordine con il totale calcolato
            DB::table('orders')->where('id', $orderId)->update(['tot' => $orderTotal]);
        }
    }
}
