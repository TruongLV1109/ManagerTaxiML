<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punishes', function (Blueprint $table) {
            $table->char('PunishCd',10);
            $table->char('DriverCd',10);
            $table->char('PunishTypeCd',10);
            $table->string('FormPunish',400)->nullable();
            $table->integer('Money')->default(0); 
            $table->string('FrDate',8)->nullable();
            $table->string('ExDate',8)->nullable();
            $table->integer('Status')->default(0); 
            $table->string('Notes',1000)->nullable();
            $table->foreign('DriverCd')->references('DriverCd')->on('drivers');
            $table->foreign('PunishTypeCd')->references('PunishTypeCd')->on('punish_types');
            $table->primary('PunishCd');
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
        Schema::dropIfExists('punishes');
    }
}
