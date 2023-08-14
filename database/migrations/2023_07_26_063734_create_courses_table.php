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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('permalink')->nullable();
            $table->text('description');
            $table->integer('price');
            $table->string('requirements')->nullable();
            $table->string('target_student')->nullable();
            $table->string('min_point')->nullable();
            $table->string('quiz_status')->nullable();
            $table->string('certificate_status')->nullable();
            $table->string('time_limit_status')->nullable();
            $table->string('image')->nullable();
            $table->string('background_image')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->foreignId('currency_id')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
