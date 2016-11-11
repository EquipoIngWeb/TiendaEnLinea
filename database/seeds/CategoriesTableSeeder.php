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
		$ropa = new App\Category();
		$ropa->name="Ropa";
		$ropa->save();

		$zapatos = new App\Category();
		$zapatos->name="Calzado";
		$zapatos->save();

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
		$caballero->parents()->attach($ropa->id);
		$caballero->parents()->attach($zapatos->id);


		foreach ($categories_caballero as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$c->parents()->attach($zapatos->id);
			$caballero->children()->attach($c->id);
		}

		$categories_dama = array_merge($categories_caballero,['Zapatilla']);
		$dama = new App\Category();
		$dama->name="Dama";
		$dama->save();
		$dama->parents()->attach($ropa->id);
		$dama->parents()->attach($zapatos->id);
		foreach ($categories_dama as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$c->parents()->attach($zapatos->id);
			$dama->children()->attach($c->id);
		}

		$categories_ropa_dama = [
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
		];
		foreach ($categories_ropa_dama as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$c->parents()->attach($ropa->id);
			$dama->children()->attach($c->id);
		}

		$categories_ropa_caballero = [
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

		foreach ($categories_ropa_caballero as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$c->parents()->attach($ropa->id);
			$caballero->children()->attach($c->id);
		}
		$categories_ropa_infantil = ['Ropa de Niña','Ropa de Niño'];
		$infantil = new App\Category();
		$infantil->name="Infantil";
		$infantil->save();
		$infantil->parents()->attach($ropa->id);
		$infantil->parents()->attach($zapatos->id);

		foreach ($categories_ropa_infantil as $category) {
			$c = App\Category::firstOrCreate(['name'=> $category ]);
			$c->parents()->attach($ropa->id);
			$infantil->children()->attach($c->id);
		}

	}
}

