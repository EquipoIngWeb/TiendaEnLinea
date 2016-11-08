<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsClothesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 	public function up()
	{
		Schema::table('clothes_categories', function ($table) {
			$table->foreign('clothes_id')->references('id')->on('clothes');
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
