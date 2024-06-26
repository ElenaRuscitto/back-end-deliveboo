<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Mail\OrderReceivedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Restaurant;



class MailController extends Controller
{
    public $currentDate;
    public $currentDateTime;
    public function sendMail($new_order, $dishes){
        $email = $new_order->email;
        $this->currentDate = Carbon::now()->format('d-m-Y');
        $this->currentDateTime = Carbon::now()->format('d-m-Y H:i:s');
        $restaurant = Restaurant::where('id', $dishes[0]['dish']['restaurant_id'])->first();
        // $restaurantEmail = $restaurant->email;
        Mail::to($email)->send(new OrderConfirmation($new_order, $dishes, $this->currentDate, $restaurant));
        Mail::to('deliveboo.team5@gmail.com')->send(new OrderReceivedNotification($new_order, $dishes, $this->currentDateTime));
        // Mail::to($restaurantEmail)->send(new OrderReceivedNotification($new_order, $dishes, $this->currentDateTime));

        return view('welcome');
    }
}
