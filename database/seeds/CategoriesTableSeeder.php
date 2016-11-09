<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = [
    	//Genero
    	'Caballero',
    	'Dama',
    	'Infantil',


    	// Para Zapatos
    	'Bota',
    	'Sandalia',
    	'Flat',
    	'Sneaker',
    	'Deportivo',
    	'Pantufla',

    	//Para Ropa Dama
    	'Playeras',
    	'Blusas',
    	'Vestidos',
    	'Camisas',
    	'Suéter',
    	'Sacos',
    	'Sudaderas',
    	'Pantalones',
    	'Jeans',
    	'Leggings',
    	'Shorts',
    	'Faldas',
    	'Trajes de Baño',
    	'Chalecos',
    	'Pants',
    	'Chamarras',
    	'Abrigos',
    	'Ropa Interior',
    	// Ropa para Caballero
    	'Trajes',
    	'Sacos',
    	'Playeras',
    	'Camisas',
    	'Suéter',
    	'Sudaderas',
    	'Chamarras',
    	'Chalecos',
    	'Pantalones',
    	'Trajes de Baño',
    	'Jeans',
    	'Shorts',
    	'Abrigos',
    	'Pants',
    	'Pijama',
    	'Ropa Interior'
    	];
    	foreach ($categories as $category) {
    		factory(App\Color::class)->create(['name'=>$category]);
    	}
    }
}

