<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$brands = [
			['image' => "images/brands/7.png",'name'=>'Wrangler','url'=>"http://www.wrangler-footwear.com/"],
			['image' => "images/brands/addidas.jpg",'name'=>'Adidas','url'=>"http://www.adidas.mx/"],
			['image' => "images/brands/allen.png",'name'=>'Allen Solly','url'=>"https://www.allensolly.com"],
			['image' => "images/brands/calvin.png",'name'=>'Calvin Klein','url'=>"http://www.calvinklein.us/"],
			['image' => "images/brands/converse.png",'name'=>'Converse','url'=>"http://www.converse.com.mx/"],
			['image' => "images/brands/express.png",'name'=>'Express','url'=>"http://www.express.com/"],
			['image' => "images/brands/fila.png",'name'=>'Fila','url'=>"http://www.fila.com/"],
			['image' => "images/brands/flexi.png",'name'=>'Flexi ','url'=>"http://flexi.shoes/mx/"],
			['image' => "images/brands/lacoste.png",'name'=>'Lacoste','url'=>"http://global.lacoste.com/en/lacoste"],
			['image' => "images/brands/levis.png",'name'=>"Levi's",'url'=>"http://www.levi.com.mx/mexico/index.aspx"],
			['image' => "images/brands/park.jpg",'name'=>'Park Avenue','url'=>"http://parkavenue.com.ar/"],
			['image' => "images/brands/pepe.png",'name'=>'Pepe Jeans','url'=>"http://www.pepejeans.com/es_es/"],
			['image' => "images/brands/puma.png",'name'=>'Puma','url'=>"http://global.puma.com/"],
			['image' => "images/brands/reebok.png",'name'=>'Reebok','url'=>"http://www.reebok.mx/"],
			['image' => "images/brands/tommyhilfiger.png",'name'=>'Tommy Hilfiger','url'=>"http://mx.tommy.com/"],
	    ];

	    foreach ($brands as $brand) {
	    	\App\Brand::create($brand);
	    }

	}
}
