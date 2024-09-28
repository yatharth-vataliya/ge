<?php

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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->integer('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->integer('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('sem', 5);
            $table->string('enrollment_no')->unique();
            $table->string('full_name');
            $table->string('gender');
            $table->string('contact', 13);
            $table->string('status')->default('active');
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
        Schema::dropIfExists('students');
    }
}
