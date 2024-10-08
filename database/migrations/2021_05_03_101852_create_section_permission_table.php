<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('section_permission', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('section_id');
//            $table->unsignedBigInteger('permission_id');
//           // $table->primary(['section_id','permission_id']);
//            $table->foreign('section_id')->references('id')->on('sections');
//            $table->foreign('permission_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('section_permission');
    }
}
