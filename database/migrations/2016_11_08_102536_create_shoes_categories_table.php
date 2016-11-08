<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('shoes_categories', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('shoes_id')->unsigned();
    		$table->integer('category_id')->unsigned();
    		$table->timestamps();
    	});
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('shoes_categories');
	}
}
