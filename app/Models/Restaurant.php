<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Restaurant extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function dishes(){
        return $this->belongsTo(Dish::class);
    }
    public function types(){
        return $this->belongsToMany(Type::class);
    }

    public function getRestaurant(){
        return $this->;
    }

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'email',
        'address',
        'vat',
        'image',
    ];
}
