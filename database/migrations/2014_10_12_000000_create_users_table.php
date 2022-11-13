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
            $table->binary('profile')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('contact')->nullable();
            $table->string('idnumber')->nullable();
            $table->string('grade')->nullable();
            $table->string('section')->nullable();
            $table->string('strand')->nullable();
            $table->string('gender')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
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
