<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author');
            $table->string('title');
            $table->string('description');
            $table->string('english_name');
            $table->text('body');
            $table->enum('type', ['post', 'page']);
            $table->string('position')->nullable();
            $table->enum('shared', ['disable', 'enable', 'draft']);
            $table->bigInteger('view');
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
        Schema::dropIfExists('pages');
    }
}
