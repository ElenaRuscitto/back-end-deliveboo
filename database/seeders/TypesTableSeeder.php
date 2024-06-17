<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Italiano',
                'image' => ''
            ],
            [
                'name' => 'Cinese',
                'image' => ''
            ],
            [
                'name' => 'Giapponese',
                'image' => ''
            ],
            [
                'name' => 'Messicano',
                'image' => ''
            ],
            [
                'name' => 'Indiano',
                'image' => ''
            ],
            [
                'name' => 'Hamburgeria',
                'image' => ''
            ],
            [
                'name' => 'Thailandese',
                'image' => ''
            ],
            [
                'name' => 'Fast Food',
                'image' => ''
            ],
            [
                'name' => 'Fusion',
                'image' => ''
            ],
            [
                'name' => 'Kebab',
                'image' => ''
            ],
            [
                'name' => 'Piadineria',
                'image' => ''
            ],
            [
                'name' => 'Poke',
                'image' => ''
            ],
        ];
        foreach($types as $type){
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = $type['image'];
            $new_type->save();
         }
    }
}
