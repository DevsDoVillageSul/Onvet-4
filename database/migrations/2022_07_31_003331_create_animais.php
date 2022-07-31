<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('sexo', 20);
            $table->string('sangue', 20);
            $table->string('raca', 50);
            $table->integer('brinco');

            $table->unsignedBigInteger('lote_id');
            $table->foreign('lote_id')
                ->references('id')
                ->on('lotes')
            ;

            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')
                ->references('id')
                ->on('fornecedor')
            ;

            $table->tinyInteger('ativo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('animais');
    }
}