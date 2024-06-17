<?php
namespace App\Functions ;

use Illuminate\Support\Str;


class Helper{

    public static function createSlug($string, $model){
        $slug = Str::slug($string, '-');
        $original_slug = $slug ;

        $exist = $model::where ('slug', $slug)->first();
        $c = 1;

        while($exist){
            $slug =  $original_slug . '-' . $c ;
            $exist = $model::where ('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
