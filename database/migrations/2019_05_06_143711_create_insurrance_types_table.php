<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurranceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurrance_types', function (Blueprint $table) {
            $table->char('InsurranceTypeCd',10);
            $table->string('InsurranceTypeNm',200)->nullable();
            $table->string('Notes',1000)->nullable();
            $table->primary('InsurranceTypeCd');
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
        Schema::dropIfExists('insurrance_types');
    }
}
