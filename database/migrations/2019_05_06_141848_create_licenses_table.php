<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->char('LicenseCd',10);
            $table->char('DriverCd',10);
            $table->char('LicenseTypeCd',10);
            $table->char('LicenseSeq',3)->nullable();
            $table->string('FrDate',8)->nullable();
            $table->string('ExDate',8)->nullable();
            $table->integer('Status')->default(0); 
            $table->string('Notes',1000)->nullable();
            $table->foreign('DriverCd')->references('DriverCd')->on('drivers');
            $table->foreign('LicenseTypeCd')->references('LicenseTypeCd')->on('license_types');
            $table->primary('LicenseCd');
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
        Schema::dropIfExists('licenses');
    }
}
