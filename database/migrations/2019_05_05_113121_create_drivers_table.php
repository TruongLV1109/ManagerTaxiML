<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('DriverNo',50)->unique();
            $table->string('DriverName',200);
            $table->date('Birthday');
            $table->string('Address',500);
            $table->date('FrWork');
            $table->string('Cmnd',50);
            $table->boolean('Sex')->nullable();
            $table->integer('Phone')->unique();
            $table->integer('idUser')->unsigned();
            $table->string('Email',200)->nullable();
            $table->integer('Status')->nullable();
            $table->string('Notes',1000)->nullable();
            $table->string('Avatar',500)->nullable();
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('drivers');
    }
}
