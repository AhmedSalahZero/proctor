<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('products', function (Blueprint $table) {
//            $table->id();
//            $table->json('name');
//            $table->string('slug',255)->unique();
//            $table->json('description');
//            $table->float('price')->default(0.0);
//            $table->string('image');
//            $table->unsignedBigInteger('category_id')->index();
//            $table->foreign('category_id')->references('id')->on('categories');
//            $table->timestamps();
//        });
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
