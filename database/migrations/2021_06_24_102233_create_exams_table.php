<?php

use App\Models\Exam;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('pass_percentage');
            $table->string('zoom_link');
            $table->integer('no_questions');
            $table->dateTime('start_date');
            $table->string('duration');
            $table->enum('type',[Exam::ACCURATETYPE,Exam::FLEXIBLETYPE])->default(Exam::FLEXIBLETYPE);
     //       $table->unsignedBigInteger('certification_id')->nullable();
    //        $table->foreign('certification_id')->references('id')->on('certifications');
            $table->boolean('display')->default(false);
            $table->boolean('end')->default(false);
      //      $table->string('certification_name');
     //       $table->string('supplement');
         //   $table->string('provider');
         //   $table->date('compilation_date');
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
        Schema::dropIfExists('exams');
    }
}
