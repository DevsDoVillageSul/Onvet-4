<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastrosFazendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();   
            $table->string('nome', 50);
            $table->string('cep', 10);
            $table->string('endereco', 100);
            $table->string('cidade', 50);
            $table->string('uf', 2);       
            $table->tinyInteger('ativo');
            
            //chaves estrangeiras
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
            ;
 
            $table->bigInteger('fazenda_id')->nullable()->unsigned();
            $table->foreign('fazenda_id')->nullable()->unsigned()
                ->references('id')
                ->on('fazenda');
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
        Schema::dropIfExists('fazendas');
    }
}
