<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->char('ContractCd',10);
            $table->char('DriverCd',10);
            $table->char('ContractTypeCd',10);
            $table->char('ContractSeq',3)->nullable();
            $table->string('FrDate',8)->nullable();
            $table->string('ExDate',8)->nullable();
            $table->integer('Status')->default(0); 
            $table->string('Notes',1000)->nullable();
            $table->foreign('DriverCd')->references('DriverCd')->on('drivers');
            $table->foreign('ContractTypeCd')->references('ContractTypeCd')->on('contract_types');
            $table->primary('ContractCd');
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
        Schema::dropIfExists('contracts');
    }
}
