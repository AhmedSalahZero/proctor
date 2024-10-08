<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('exam_student', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('exam_id');
//            $table->unsignedBigInteger('student_id');
//            $table->boolean('absence')->default(false);
//            $table->string('done')->default(false);
//            $table->foreign('exam_id')->references('id')->on('exams');
//            $table->foreign('student_id')->references('id')->on('students');
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
     //   Schema::dropIfExists('exam_student');
    }
}
