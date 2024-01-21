<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sub_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_advisory_id')->references('id')->on('class_advisories')->cascadeOnDelete();
            $table->foreignId('class_sub_id')->references('id')->on('class_subjects')->cascadeOnDelete();
            $table->foreignId('student_id')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('gradeLevel');
            $table->integer('semester');
            $table->double('first_grading')->nullable();
            $table->double('second_grading')->nullable();
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
        Schema::dropIfExists('class_sub_grades');
    }
};
