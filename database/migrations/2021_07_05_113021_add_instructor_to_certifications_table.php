<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstructorToCertificationsTable extends Migration
{

    public function up()
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->string('instructor_name')->nullable();

        });
    }

    public function down()
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->dropColumn('instructor_name');
        });
    }
}
