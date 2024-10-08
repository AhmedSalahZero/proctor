<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('media', function (Blueprint $table) {
//            $table->id();
//            $table->json('name');
//            $table->string('slug',255)->unique();
//            $table->string('link')->nullable();
//            $table->timestamps();
//        });
    }


    public function down()
    {
        Schema::dropIfExists('media');
    }
}
