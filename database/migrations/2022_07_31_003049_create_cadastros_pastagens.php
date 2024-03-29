<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastrosPastagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastagem', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('dt_ini', 20);
            $table->string('dt_fim', 20);
            $table->string('area', 50);
            $table->string('tipo', 50);
            $table->string('custo', 50);
            $table->string('total', 50);
            $table->text('observacao')->nullable();

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

            $table->tinyInteger('ativo');
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
        Schema::dropIfExists('pastagem');
    }
}