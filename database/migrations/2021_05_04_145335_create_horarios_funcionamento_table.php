<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosFuncionamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_funcionamento', function (Blueprint $table) {
            $table->id();
            $table->time('hr_inicio');
            $table->time('hr_termino');
            $table->unsignedBigInteger('dias_semana_id');

            $table->foreign('dias_semana_id')->references('id')->on('dias_semana');

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
        Schema::dropIfExists('horarios_funcionamento');
    }
}
