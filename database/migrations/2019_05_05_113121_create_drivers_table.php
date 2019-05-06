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
            $table->char('DriverCd',10);
            $table->string('DriverNm',200)->nullable();
            $table->string('Birthday',8)->nullable();
            $table->string('Address',500)->nullable();
            $table->string('DayWork',8)->nullable();
            $table->string('Cmnd',50)->nullable();
            $table->string('Status',50)->nullable();
            $table->string('Notes',1000)->nullable();
            $table->string('Avatar',500)->nullable();
            $table->primary('DriverCd');
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
