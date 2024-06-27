<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Mail\MailController;
use App\Mail\OrderConfirmation;

class OrdersController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'telephone' => 'nullable|string',
            'notes' => 'nullable|string',

        ]);


        // $data = $request->all();
        $new_order = new Order();
        $new_order->name = $request->name;
        $new_order->code = $request->code;
        $new_order->address = $request->address;
        $new_order->email = $request->email;
        $new_order->telephone = $request->telephone;
        $new_order->desc = $request->notes;
        $new_order->tot = number_format((float)$request->tot, 2, '.', '');

        $new_order->save();

        if (isset($request->dishes) && is_array($request->dishes)) {
            foreach ($request->dishes as $dish) {
                // Controllare che 'id' e 'quantity' esistano in ogni oggetto 'dish'
                if (isset($dish['dish']['id']) && isset($dish['quantity'])) {
                    $new_order->dishes()->attach($dish['dish']['id'], ['quantity' => $dish['quantity']]);
                } else {
                    // errore se mancano 'id' o 'quantity'
                    return response()->error('Dish missing id or quantity', ['dish' => $dish]);
                }
            }
        } else {
            // errore se 'dishes' non è definito o non è un array
            return response()->error('Dishes is not set or not an array', ['dishes' => $request->dishes]);
        }
        $mailController = new MailController();
        $mailController->sendMail($new_order, $request->dishes);


        return response()->json(['success' => true, 'order' => $new_order, 'piatti' => $request->dishes]);

    }
}
