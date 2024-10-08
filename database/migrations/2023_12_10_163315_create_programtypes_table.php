<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTypesTable extends Migration
{
    public function up()
    {
        Schema::create('program_types', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_types');
    }
}
