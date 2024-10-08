<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
        //    $table->string('name');
            $table->bigInteger('course_type')->unsigned();
            $table->date('completed_date');
            $table->date('valid_to')->nullable();
            $table->string('certification_id')->nullable();
            $table->longText('link')->nullable();
            $table->boolean('display')->default(false);
            $table->string('supplement')->nullable();
            $table->string('provider')->nullable();
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
        Schema::dropIfExists('certifications');
    }
}
