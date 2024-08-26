<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('object_id',191);
            $table->string('contact_name',191);
            $table->string('contact_number',191);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_details');
    }
}
