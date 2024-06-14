<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function dishes(){
        return $this->belongsTo(Dish::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'email',
        'address',
        'vat',
        'image',
    ];
}
