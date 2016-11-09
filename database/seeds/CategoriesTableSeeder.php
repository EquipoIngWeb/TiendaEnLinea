<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$first_categories=[
    	//Genero
    	'Caballero',
    	'Dama',
    	'Infantil'];
    	$categories_caballero = [
	    	'Bota',
	    	'Sandalia',
	    	'Flat',
	    	'Sneaker',
	    	'Deportivo',
	    	'Pantufla',
	    	//Solo dama
			// 'Zapatilla',
		];
		$caballero = new App\Category();
		$caballero->name="Caballero";
		$caballero->save();
		foreach ($categories_caballero as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$caballero->children()->attach($c->id);
		}

		$categories_dama = array_merge($categories_caballero,['Zapatilla']);
		$dama = new App\Category();
		$dama->name="Dama";
		$dama->save();
		foreach ($categories_dama as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$dama->children()->attach($c->id);
		}

//     	$categories = [
//     	//Para Ropa Dama
//     	'Playeras',
//     	'Blusas',
//     	'Vestidos',
//     	'Camisas',
//     	'Suéter',
//     	'Sacos',
//     	'Sudaderas',
//     	'Pantalones',
//     	'Jeans',
//     	'Leggings',
//     	'Shorts',
//     	'Faldas',
//     	'Trajes de Baño',
//     	'Chalecos',
//     	'Pants',
//     	'Chamarras',
//     	'Abrigos',
//     	'Ropa Interior',
// ];
//     	$categories = [

//     	// Ropa para Caballero
//     	'Trajes',
//     	'Sacos',
//     	'Playeras',
//     	'Camisas',
//     	'Suéter',
//     	'Sudaderas',
//     	'Chamarras',
//     	'Chalecos',
//     	'Pantalones',
//     	'Trajes de Baño',
//     	'Jeans',
//     	'Shorts',
//     	'Abrigos',
//     	'Pants',
//     	'Pijama',
//     	'Ropa Interior'
//     	];

    }
}

