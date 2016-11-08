<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsShoesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 	public function up()
	{
		Schema::table('shoes_categories', function ($table) {
			$table->foreign('shoes_id')->references('id')->on('shoes');
			$table->foreign('category_id')->references('id')->on('categories');
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
