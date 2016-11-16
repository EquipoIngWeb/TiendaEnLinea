<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$sizes = ['XS','S','M','L','XL','22','22.5','23','23.5','24','24.5','25','25.5','26','26.5','27','27.5','28','28.5','29','29.5','30','60','65','75','85','90'];
    	foreach ($sizes as $key ) {
    		$size = new App\Size();
    		$size->name = $key;
    		$size->save();
    	}
    }
}
