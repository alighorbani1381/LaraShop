<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
             $table->increments('id')->index();
             $table->integer('user_id');
             $table->integer('category_id');
			 $table->string('name');
			 $table->string('brand');
			 $table->integer('price');
             $table->integer('discount');
             $table->enum('special',['0','1']);
             $table->integer('bestseler');
			 $table->string('body');
			 $table->string('image')->default('lorempixel.com/50/50/food');
			 $table->integer('total');
			 $table->integer('category')->default('0');
			 $table->enum('status',['0','1']);
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
        Schema::dropIfExists('products');
    }
}

