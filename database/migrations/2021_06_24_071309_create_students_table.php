<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('students', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->string('basic_email');
//            $table->string('alt_email')->nullable();
//            $table->string('phone');
//            $table->string('address');
//            $table->enum('type',[Student::ADMIN,Student::STUDENT]);
//            $table->string('password');
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
      //  Schema::dropIfExists('students');
    }
}
