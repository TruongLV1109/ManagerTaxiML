<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->char('userNo',50)->unique();
            $table->string('username',100)->unique();
            $table->integer('level');
            $table->string('email',109)->nullable();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password');
            $table->integer('CreMan')->unsigned()->nullable();
            $table->integer('UpMan')->unsigned()->nullable();
            $table->foreign('CreMan')->references('id')->on('users');
            $table->foreign('UpMan')->references('id')->on('users');
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
