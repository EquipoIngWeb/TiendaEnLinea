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
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Blanca Manga V',
					'price'=>'199',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Rayas',
					'price'=>'248',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Beige',
					'price'=>'298',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Marino',
					'price'=>'332',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Gris Jaspe',
					'price'=>'248',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Blanca Manga ',
					'price'=>'199',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Playera Azul Marino sin Mangas',
					'price'=>'199',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Blusa Gris Cuello Redondo',
					'price'=>'259',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					]
				];
		$gender = App\Gender::where('name','Dama')->first();
		$category = App\Category::where('name','Ropa')->where('gender_id',$gender->id)->first();
		$subcategory = App\Subcategory::where('name','Playeras')->where('category_id',$category->id)->first();
		foreach ($articles as $article) {
			$product = new App\Product();
			$product->fill(array_merge($article,['subcategory_id'=>$subcategory->id]));
			$product->save();
		}
		$articles=[[
					'name'=>'Tenis Blanco',
					'price'=>'339',
					'brand_id'=>App\Brand::all()->random(1)->id,
					'color_id'=>App\Color::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Xssr',
					'price'=>'699',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Bg3',
					'price'=>'699',
					'brand_id'=>App\Brand::all()->random(1)->id,
					'color_id'=>App\Color::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Mnt',
					'price'=>'699',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Dc Flash 2 Tx M Shoe Blk',
					'price'=>'699',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Negro',
					'price'=>'429',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Rosa',
					'price'=>'339',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis Con Plataforma DANNICA',
					'price'=>'2199',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					],
					[
					'name'=>'Tenis ELLIAS',
					'price'=>'1449',
					'color_id'=>App\Color::all()->random(1)->id,
					'brand_id'=>App\Brand::all()->random(1)->id,
					]
			];
			$category = App\Category::where('name','Calzado')->where('gender_id',$gender->id)->first();
			$subcategory = App\Subcategory::where('name','Deportivo')->where('category_id',$category->id)->first();
			foreach ($articles as $article) {
				$product = new App\Product();
				$product->fill(array_merge($article,['subcategory_id'=>$subcategory->id]));
				$product->save();
			}
	}
}






