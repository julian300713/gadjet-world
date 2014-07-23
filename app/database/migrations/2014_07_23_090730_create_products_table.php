<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        //create product table
        Schema::create('products', function($table){
            //autoincrement id
            $table->increments('id');
            //field to hold foreign key
            $table->unsignedInteger('category_id');
            //setup foreign key by connecting it to id in categories table
            $table->foreign('category_id')->references('id')->on('categories');
            //title field
            $table->string('title');

            $table->text('description');
            //decimal field
            $table->decimal('price', 6, 2);
            //boolean with default of 1 = true
            $table->boolean('availability')->default(1);
            //image path field
            $table->string('image');
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
		//
        //delete table
        Schema::drop('products');
	}

}
