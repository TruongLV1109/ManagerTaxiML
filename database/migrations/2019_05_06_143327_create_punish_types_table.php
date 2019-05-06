<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunishTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punish_types', function (Blueprint $table) {
            $table->char('PunishTypeCd',10);
            $table->string('PunishTypeNm',200)->nullable();
            $table->string('Notes',1000)->nullable();
            $table->primary('PunishTypeCd');
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
        Schema::dropIfExists('punish_types');
    }
}
