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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('major_id')->constrained();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('lecturer_id')->constrained();
            $table->boolean('mandatory');
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
        Schema::dropIfExists('subjects');
    }
};
