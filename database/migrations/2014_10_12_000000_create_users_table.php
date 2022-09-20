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
        Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('personal_id')->unique();
                $table->string('email')->unique();
                $table->string('phone_number')->unique();
                $table->string('address');
                $table->date('date_of_birth');
                $table->char('sex');
                $table->char('status');
                $table->string('address_second')->nullable();
                $table->integer('apartment_num')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
