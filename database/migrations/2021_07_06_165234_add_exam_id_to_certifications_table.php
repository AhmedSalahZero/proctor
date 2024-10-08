<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamIdToCertificationsTable extends Migration
{

    public function up()
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_id')->after('student_id')->nullable();
        });


    }

    public function down()
    {
      Schema::table('certifications', function (Blueprint $table) {
            $table->dropColumn('exam_id');
        });
    }
}
