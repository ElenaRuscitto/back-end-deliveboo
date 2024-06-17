<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Restaurant;

class Dish extends Model
{
    use HasFactory;
    public function restaurants(){
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }


    protected $fillable=[ 'name', 'desc', 'price', 'visibility', 'image', 'vegan'];
}
