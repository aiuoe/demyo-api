<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('lastname');
            $table->string('city')->nullable();
            $table->string('about_me')->nullable();
            $table->boolean('relationship')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['user', 'subscriber', 'admin'])->default('user');
            $table->enum('sex', ['male', 'female', 'couple', 'male_couple', 'female_couple'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
}
