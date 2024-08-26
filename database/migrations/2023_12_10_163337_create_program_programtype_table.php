<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramProgramtypeTable extends Migration
{
    public function up()
    {
        Schema::create('program_programtype', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('program_type_id');
            $table->timestamps();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('program_type_id')->references('id')->on('program_types')->onDelete('cascade');

            $table->unique(['program_id', 'program_type_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_programtype');
    }
}
