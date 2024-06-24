<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(Request $request){
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

        return response()->json(['success' => true, 'order' => $new_order, 'piatti' => $request->dishes]);
    }
}
