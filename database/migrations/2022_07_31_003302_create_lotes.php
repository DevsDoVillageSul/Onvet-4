<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('desc', 50);
            $table->string('abv', 10);
            $table->string('sexo', 20);
            $table->string('fase', 20);
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
        Schema::dropIfExists('lotes');
    }
}