<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementConstitutifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_constitutifs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('intitule');
            $table->unique('intitule', 'code');
            $table->integer('unite_enseignements_id');
            $table->foreign('unite_enseignements_id')->references('id')->on('unite_enseignements')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element_constitutifs');
    }
}
