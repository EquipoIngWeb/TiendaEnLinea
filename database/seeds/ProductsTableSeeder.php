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
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Blanca Manga V',
					'price'=>'199',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Rayas',
					'price'=>'248',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Beige',
					'price'=>'298',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Marino',
					'price'=>'332',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Gris Jaspe',
					'price'=>'248',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Blanca Manga ColorsTableSeeder.php',
					'price'=>'199',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Marino sin Mangas',
					'price'=>'199',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Blusa Gris Cuello Redondo',
					'price'=>'259',
					'brand_id'=>App\Brand::all()->random(1)->id,
					]
				];
		$category = App\Category::where('name','Playeras')->first();
		foreach ($articles as $article) {
			$product = new App\Product();
			$product->fill($article);
			$product->save();
			$product->categories()->attach($category->id);
		}
		$articles=[[
					'name'=>'Tenis Blanco',
					'price'=>'339',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Xssr',
					'price'=>'699',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Bg3',
					'price'=>'699',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Mnt',
					'price'=>'699',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Blk',
					'price'=>'699',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Negro',
					'price'=>'429',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Rosa',
					'price'=>'339',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Con Plataforma DANNICA',
					'price'=>'2199',
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis ELLIAS',
					'price'=>'1449',
					'brand_id'=>App\Brand::all()->random(1)->id,
					]
			];
			$category = App\Category::where('name','Deportivo')->first();
			foreach ($articles as $article) {
				$product = new App\Product();
				$product->fill($article);
				$product->save();
				$product->categories()->attach($category->id);
			}
	}
}






