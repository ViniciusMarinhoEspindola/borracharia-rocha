<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePneusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pneus', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->float('largura');
            $table->float('perfil');
            $table->float('aro');
            $table->float('valor');
            $table->integer('quantidade')->default(1);
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('pneus');
    }
}
