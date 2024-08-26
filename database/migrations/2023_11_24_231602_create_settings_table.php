<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',191);
            $table->string('email',191);
            $table->string('mobile',191);
            $table->string('favicon',191);
            $table->string('logo',191);
            $table->string('login_img',191);
            $table->string('profile',191);
            $table->text('desc');
            $table->text('tags');
            $table->string('solution',191);
            $table->string('main_color',191)->default('#BD1701');
            $table->string('second_color',191)->default('#ED523D');
            $table->integer('requests')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
