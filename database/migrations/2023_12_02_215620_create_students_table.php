<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->string('phone',191)->nullable();
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('student_id',191);
            $table->string('enrolment_id',191);
            $table->integer('program_type');
            $table->integer('program_name');
            $table->date('issue_date');
            $table->date('completion_date');
            $table->date('effective_date');
            $table->float('gpa')->nullable();
            $table->string('profile_image_path',191)->nullable();
            $table->string('certificate_image_path',191)->nullable();
            $table->boolean('status')->default(1);
            $table->text('remarks')->default('saved');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
