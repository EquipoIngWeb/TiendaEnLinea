<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data =[
    		'Zapatos' 	=> 'Esta es una descripcíon del calzado que se vende de manera diaria en este sistema',
    		'Ropa'		=> 'Esta es una descripcíon de la ropa que se vende de manera diaria en este sistema',
    	];
 		foreach ($data as $name => $description) {
	    	$type = new App\Type();
 			$type->fill(compact('name','description'));
 			$type->save();
 		}
    }
}
