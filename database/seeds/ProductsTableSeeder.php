<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$articles=[[
					'name'=>'Tank Top Negro Mickey',
					'price'=>'519',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Blanca Manga V',
					'price'=>'199',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Azul Rayas',
					'price'=>'248',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Beige',
					'price'=>'298',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Azul Marino',
					'price'=>'332',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Gris Jaspe',
					'price'=>'248',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Blanca Manga ColorsTableSeeder.php',
					'price'=>'199',
					'type_id'=>'2'
					],
					[
					'name'=>'Playera Azul Marino sin Mangas',
					'price'=>'199',
					'type_id'=>'2'
					],
					[
					'name'=>'Blusa Gris Cuello Redondo',
					'price'=>'259',
					'type_id'=>'2'
					],
					[
					'name'=>'Tenis Blanco',
					'price'=>'339',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Xssr',
					'price'=>'699',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Bg3',
					'price'=>'699',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Mnt',
					'price'=>'699',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Blk',
					'price'=>'699',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Negro',
					'price'=>'429',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Rosa',
					'price'=>'339',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis Con Plataforma DANNICA',
					'price'=>'2199',
					'type_id'=>'1'
					],
					[
					'name'=>'Tenis ELLIAS',
					'price'=>'1449',
					'type_id'=>'1'
					]
			];
			foreach ($articles as $article) {
				$product = new App\Product();
				$product->fill($article);
				$product->save();
			}
	}
}






