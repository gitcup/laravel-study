<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_user'); //เก็บชื่อภาพ user
            $table->string('username');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('password');
            $table->enum('user_type', ['admin', 'officer_edit', 'officer_view']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
