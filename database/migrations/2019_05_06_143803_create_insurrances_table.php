<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurrances', function (Blueprint $table) {
            $table->char('InsurranceCd',10);
            $table->char('DriverCd',10);
            $table->char('InsurranceTypeCd',10);
            $table->char('InsurranceSeq',3)->nullable();   
            $table->string('FrDate',8)->nullable();
            $table->string('ExDate',8)->nullable();
            $table->integer('Status')->default(0); 
            $table->string('Notes',1000)->nullable();
            $table->foreign('DriverCd')->references('DriverCd')->on('drivers');
            $table->foreign('InsurranceTypeCd')->references('InsurranceTypeCd')->on('insurrance_types');
            $table->primary('InsurranceCd');
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
        Schema::dropIfExists('insurrances');
    }
}
