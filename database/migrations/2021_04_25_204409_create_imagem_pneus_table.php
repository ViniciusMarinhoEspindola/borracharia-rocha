<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemPneusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_pneus', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->integer('ordem')->default(0);
            $table->unsignedBigInteger('pneu_id');
            $table->timestamps();

            $table->foreign('pneu_id')->references('id')->on('pneus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem_pneus');
    }
}
