<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleSectionsPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('rule_section_permission', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('rule_id');
//            $table->unsignedBigInteger('section_permission_id');
//            $table->foreign('rule_id')->references('id')->on('rules');
//            $table->foreign('section_permission_id')->references('id')->on('section_permission');
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
        Schema::dropIfExists('rule_section_permission');
    }
}
