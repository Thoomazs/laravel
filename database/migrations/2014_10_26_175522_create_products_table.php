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
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('desc');
			$table->integer('stock')->unsigned();
			$table->decimal('price');
			$table->timestamps();
		});


        Schema::create('categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create( 'products_category', function ( $table )
        {
            $table->increments( 'id' )->unsigned();

            $table->integer( 'product_id' )->unsigned();
            $table->integer( 'category_id' )->unsigned();

            $table->foreign( 'product_id' )->references( 'id' )->on( 'products' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )->onUpdate( 'cascade' )->onDelete( 'cascade' );

        } );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
