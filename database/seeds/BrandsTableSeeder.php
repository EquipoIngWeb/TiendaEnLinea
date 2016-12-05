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
			['name' =>'Wrangler','image' => "images/brands/7.png",'url'=>"http://www.wrangler-footwear.com/"],
			['name' =>'Adidas','image' => "images/brands/addidas.jpg",'url'=>"http://www.adidas.mx/"],
			['name' =>'Allen Solly','image' => "images/brands/allen.png",'url'=>"https://www.allensolly.com"],
			['name' =>'Calvin Klein','image' => "images/brands/calvin.png",'url'=>"http://www.calvinklein.us/"],
			['name' =>'Converse','image' => "images/brands/converse.png",'url'=>"http://www.converse.com.mx/"],
			['name' =>'Express','image' => "images/brands/express.png",'url'=>"http://www.express.com/"],
			['name' =>'Fila','image' => "images/brands/fila.png",'url'=>"http://www.fila.com/"],
			['name' =>'Flexi ','image' => "images/brands/flexi.png",'url'=>"http://flexi.shoes/mx/"],
			['name' =>'Lacoste','image' => "images/brands/lacoste.png",'url'=>"http://global.lacoste.com/en/lacoste"],
			['name' =>"Levi's",'image' => "images/brands/levis.png",'url'=>"http://www.levi.com.mx/mexico/index.aspx"],
			['name' =>'Park Avenue','image' => "images/brands/park.jpg",'url'=>"http://parkavenue.com.ar/"],
			['name' =>'Pepe Jeans','image' => "images/brands/pepe.png",'url'=>"http://www.pepejeans.com/es_es/"],
			['name' =>'Puma','image' => "images/brands/puma.png",'url'=>"http://global.puma.com/"],
			['name' =>'Reebok','image' => "images/brands/reebok.png",'url'=>"http://www.reebok.mx/"],
			['name' =>'Tommy Hilfiger','image' => "images/brands/tommyhilfiger.png",'url'=>"http://mx.tommy.com/"],
			['name' =>'LOB','url'=>'http://lob.com.mx/'],
			['name' =>'West Avenue Maternity','url'=>'http://www.osom.com/moda/west-avenue-maternity/'],
			['name' =>'US Polo ASSN','url'=>'http://la.uspoloassn.com/'],
			['name' =>'Rewind','url'=>'http://www.rewindconsignment.com/'],
			['name' =>'Rapsodia','image' => "images/brands/logo-rapsodia.svg",'url'=>'http://www.rapsodia.com.mx/'],
			['name' =>'Ferrioni','url'=>'https://world.benetton.com/'],
			['name' =>'United Colors of Benetton','image' => "images/brands/ucob.png",'url'=>'https://world.benetton.com/'],
			['name' =>'Marsol','url'=>'https://www.facebook.com/marsolaccessories/'],
			['name' =>'Oki Dow','url'=>'http://www.oki-ni.com/'],
			['name' =>'Simple People','url'=>'https://www.freepeople.com/clothes/'],
			['name' =>'Nike','image' =>"images/brands/nike.png",'url'=>'http://www.nike.com/'],
			['name' =>'Skechers','image' => "images/brands/skechers.png",'url'=>'https://www.skechers.com/en-us/'],
	    ];

	    foreach ($brands as $brand) {
	    	\App\Brand::create($brand);
	    }

	}
}
