<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Color::class, 10)->create();
    	$colors = [
			['name'=>'Amarillo' ,'example'=>'#ffd200'],
			['name'=>'Azul' ,'example'=>'#1245a8'],
			['name'=>'Blanco' ,'example'=>'#f5f5f5'],
			['name'=>'Coral' ,'example'=>'#fe7062'],
			['name'=>'Gris' ,'example'=>'#8c8c8c'],
			['name'=>'Café' ,'example'=>'#6f3c00'],
			['name'=>'Chocolate' ,'example'=>'#6f3c00'],
			['name'=>'Multicolor' ,'example'=>'#9fccd5'],
			['name'=>'Plata' ,'example'=>'#cacaca'],
			['name'=>'Naranja' ,'example'=>'#fe7200'],
			['name'=>'Beige' ,'example'=>'#f9e6c8'],
			['name'=>'Negro' ,'example'=>'#000000'],
			['name'=>'Oro' ,'example'=>'#d79d02'],
			['name'=>'Rojo' ,'example'=>'#e60000'],
			['name'=>'Rosa' ,'example'=>'#ff3686'],
			['name'=>'Verde' ,'example'=>'#087925'],
			['name'=>'Violeta' ,'example'=>'#78039f'],
			['name'=>'Vino' ,'example'=>'#722f37'],
			['name'=>'Azul Marino' ,'example'=>'#141b4c'],
			['name'=>'Bronce' ,'example'=>'#ae5301']
    	];
    	foreach ($colors as $color) {
    		\App\Color::create($color);
    	}
    }
}
