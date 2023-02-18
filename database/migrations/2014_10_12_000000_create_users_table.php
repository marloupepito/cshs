w<?php

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

         Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('contact')->nullable();
            $table->string('idnumber')->nullable();
            $table->string('grade')->nullable();
            $table->string('section')->nullable();
            $table->string('strand')->nullable();
            $table->string('gender')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('access')->nullable();
            $table->string('usertype')->nullable();
            $table->string('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('what')->nullable();
            $table->string('when')->nullable();
            $table->string('where')->nullable();
            $table->string('status')->nullable();
            $table->string('qr')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable();
            $table->bigInteger('event_id')->nullable();
            $table->string('ms')->nullable();
            $table->string('me')->nullable();
            $table->string('ass')->nullable();
            $table->string('ae')->nullable();
            $table->string('grade')->nullable();
            $table->string('section')->nullable();
            $table->string('strand')->nullable();
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
