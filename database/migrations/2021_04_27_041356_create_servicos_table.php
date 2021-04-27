<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('estimated_time')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('pneu_id')->nullable();
            $table->timestamps();

            $table->foreign('pneu_id')->references('id')->on('pneus')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}
