<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->char('EmployeeNo',50)->unique();
            $table->string('EmployeeName',200);
            $table->string('Address',500);
            $table->date('Birthday');
            $table->date('FrWork');
            $table->string('Cmnd',50);
            $table->boolean('Sex')->nullable();
            $table->string('Phone',50)->unique();
            $table->integer('level');
            $table->integer('idUser')->unsigned()->nullable();
            $table->string('Email',200)->nullable();
            $table->string('Avatar',500)->nullable();
            $table->integer('Status')->nullable();
            $table->string('Notes',1000)->nullable();

            $table->integer('CreMan')->unsigned()->nullable();
            $table->integer('UpMan')->unsigned()->nullable();
            $table->foreign('CreMan')->references('id')->on('users');
            $table->foreign('UpMan')->references('id')->on('users');
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
        Schema::dropIfExists('employees');
    }
}
