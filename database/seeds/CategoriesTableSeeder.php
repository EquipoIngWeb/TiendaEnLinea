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
		$caballero = new App\Gender();
		$caballero->name="Caballero";
		$caballero->save();

		$dama = new App\Gender();
		$dama->name="Dama";
		$dama->save();


		$calzado_caballero = new App\Category();
		$calzado_caballero->name="Calzado";
		$calzado_caballero->gender_id = $caballero->id;
		$calzado_caballero->save();

		$calzado_dama = new App\Category();
		$calzado_dama->name="Calzado";
		$calzado_dama->gender_id = $dama->id;
		$calzado_dama->save();

		$ropa_caballero = new App\Category();
		$ropa_caballero->name="Ropa";
		$ropa_caballero->gender_id = $caballero->id;
		$ropa_caballero->save();

		$ropa_dama = new App\Category();
		$ropa_dama->name="Ropa";
		$ropa_dama->gender_id = $dama->id;
		$ropa_dama->save();


		$categories_caballero = [
			'Bota',
			// 'Sandalia',
			// 'Flat',
			'Sneaker',
			'Deportivo',
			// 'Pantufla',
		];
		foreach ($categories_caballero as $category) {
			App\Subcategory::create(['name'=> $category,'category_id'=>$calzado_caballero->id]);
		}

		$categories_dama = array_merge($categories_caballero,['Zapatilla']);
		foreach ($categories_dama as $category) {
			App\Subcategory::create(['name'=> $category,'category_id'=>$calzado_dama->id]);
		}

		$categories_ropa_dama = [
		'Playeras',
		'Blusas',
		'Vestidos',
		'Sacos',
		'Pantalones',
		'Trajes de Baño',
		'Pants',
		'Ropa Interior',
		];
		foreach ($categories_ropa_dama as $category) {
			App\Subcategory::create(['name'=> $category,'category_id'=>$ropa_dama->id]);
		}

		$categories_ropa_caballero = [
		'Trajes',
		'Sacos',
		'Playeras',
		'Camisas',
		'Pantalones',
		'Jeans',
		'Pants',
		'Pijama',
		];

		foreach ($categories_ropa_caballero as $category) {
			App\Subcategory::create(['name'=> $category,'category_id'=>$ropa_caballero->id]);
		}

		$categories_ropa_infantil = ['Ropa de Niña','Ropa de Niño'];
		$infantil = new App\Gender();
		$infantil->name="Infantil";
		$infantil->save();

		$ropa_infantil = new App\Category();
		$ropa_infantil->name="Ropa";
		$ropa_infantil->gender_id = $infantil->id;
		$ropa_infantil->save();

		foreach ($categories_ropa_infantil as $category) {
			App\Subcategory::create(['name'=> $category,'category_id'=>$ropa_infantil->id]);
		}

	}
}

