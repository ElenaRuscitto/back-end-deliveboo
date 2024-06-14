<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'address',
        'email',
        'telephone',
        'tot',
        'desc'

    ];
}
