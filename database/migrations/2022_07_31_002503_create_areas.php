<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('dt_ini', 20);
            $table->string('dt_fim', 20);
            $table->string('tipo', 20);
            $table->integer('ha');
            $table->integer('util');
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
        Schema::dropIfExists('areas');
    }
}