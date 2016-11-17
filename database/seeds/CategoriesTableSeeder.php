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

		$zapatos = new App\Category();
		$zapatos->name="Calzado";
		$zapatos->save();

		$caballero = new App\Category();
		$caballero->name="Caballero";
		$caballero->save();
		$caballero->parents()->attach($zapatos->id);

		$dama = new App\Category();
		$dama->name="Dama";
		$dama->save();
		$dama->parents()->attach($zapatos->id);

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
		foreach ($categories_caballero as $category) {
			$c = App\Category::create(['name'=> $category ]);
			$caballero->children()->attach($c->id);
		}
		$categories_dama = array_merge($categories_caballero,['Zapatilla']);
		foreach ($categories_dama as $category) {
			$c = App\Category::create(['name'=> $category ]);
			$dama->children()->attach($c->id);
		}

		$ropa = new App\Category();
		$ropa->name="Ropa";
		$ropa->save();

		$caballero = new App\Category();
		$caballero->name="Caballero";
		$caballero->save();
		$caballero->parents()->attach($ropa->id);

		$dama = new App\Category();
		$dama->name="Dama";
		$dama->save();
		$dama->parents()->attach($ropa->id);

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
			$c = App\Category::create(['name'=> $category ]);
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
			$c = App\Category::create(['name'=> $category ]);
			$caballero->children()->attach($c->id);
		}

		$categories_ropa_infantil = ['Ropa de Niña','Ropa de Niño'];
		$infantil = new App\Category();
		$infantil->name="Infantil";
		$infantil->save();
		$infantil->parents()->attach($ropa->id);
		foreach ($categories_ropa_infantil as $category) {
			$c = App\Category::create(['name'=> $category ]);
			$infantil->children()->attach($c->id);
		}
		$infantil = new App\Category();
		$infantil->name="Infantil";
		$infantil->save();
		$infantil->parents()->attach($zapatos->id);

	}
}

