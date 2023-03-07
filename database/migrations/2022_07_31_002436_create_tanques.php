<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanques', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('litros');
            $table->text('observacao')->nullable();
            $table->tinyInteger('ativo');

            //chaves estrangeiras
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
            ;

            //chaves estrangeiras
            $table->unsignedBigInteger('fazenda_id');
            $table->foreign('fazenda_id')
                ->references('id')
                ->on('fazendas')
            ;

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
        Schema::dropIfExists('tanques');
    }
}