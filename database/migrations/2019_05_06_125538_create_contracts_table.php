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
            $table->increments('id');
            $table->char('ContractNo',50)->unique();
            $table->string('ContractName',200);
            $table->integer('IdDriver')->unsigned();
            $table->integer('IdContractType')->unsigned();
            $table->char('ContractSeq',3);
            $table->date('FrDate');
            $table->date('ExDate')->nullable();
            $table->string('FileContent',1000);
            $table->string('Notes',1000)->nullable();

            $table->integer('CreMan')->unsigned()->nullable();
            $table->integer('UpMan')->unsigned()->nullable();
            $table->foreign('CreMan')->references('id')->on('users');
            $table->foreign('UpMan')->references('id')->on('users');
            $table->foreign('IdDriver')->references('id')->on('drivers');
            $table->foreign('IdContractType')->references('id')->on('contract_types');
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
