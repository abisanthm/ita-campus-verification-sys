<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('certificate_settings', function (Blueprint $table) {
            $table->id();
            $table->string('welcome_message',191);
            $table->string('footer_title',191);
            $table->text('footer_message');
            $table->string('invalid_title',191);
            $table->text('invalid_message');
            // You can add more columns as needed
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('certificate_settings');
    }
};
