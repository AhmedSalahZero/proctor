<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
//            $table->string('phone',255);
//            $table->string('address',255);
//            $table->string('call_at',255)->nullable();
//            $table->unsignedBigInteger('media_id')->nullable();
//            $table->foreign('media_id')->references('id')->on('media');
//            $table->enum('came_from',['Website','Facebook','Twitter','Youtube','Instagram','Other'])->nullable()->default('Website');
//            $table->unsignedBigInteger('rule_id');
//            $table->foreign('rule_id')->references('id')->on('rules');
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
