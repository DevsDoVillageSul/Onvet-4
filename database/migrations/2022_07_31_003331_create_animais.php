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
            $table->integer('imagem_id')->default(0); 
            $table->string('video')->nullable();    
            $table->string('nome', 50);
            $table->string('sexo', 20);
            $table->string('sangue', 20);
            $table->string('raca', 50);
            $table->integer('brinco');
            $table->string('origem', 20);

            //campos hidden show
            $table->string('dt_nasc', 20);
            $table->integer('peso');  
            $table->string('nome_reg', 50);
            $table->integer('num_reg'); 
            $table->string('raca_2', 50);
            $table->string('pelagem', 50);
            $table->string('dt_entrada', 20)->nullable();
            $table->integer('peso_entrada')->nullable(); 


            $table->unsignedBigInteger('lote_id');
            $table->foreign('lote_id')
                ->references('id')
                ->on('lotes')
            ;

            $table->bigInteger('fornecedor_id')->nullable()->unsigned();
            $table->foreign('fornecedor_id')->nullable()->unsigned()
                ->references('id')
                ->on('fornecedor');
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