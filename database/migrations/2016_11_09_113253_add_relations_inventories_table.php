<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('inventories', function ($table) {
    		$table->foreign('product_id')->references('id')->on('products');
    		$table->foreign('color_id')->references('id')->on('colors');
    		$table->foreign('size_id')->references('id')->on('sizes');
    	});
    }
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::disableForeignKeyConstraints();
	}

}
