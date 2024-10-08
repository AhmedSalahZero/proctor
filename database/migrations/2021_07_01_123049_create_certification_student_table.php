<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('certification_student', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('certification_id');
//            $table->integer('student_id');
//            $table->boolean('display')->default(false);
//            $table->foreign('certification_id')->references('id')->on('certifications');
//            $table->foreign('student_id')->references('ID')->on('admin_users');
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
     //   Schema::dropIfExists('certification_student');
    }
}
