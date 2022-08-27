<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbrioes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embrioes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('tipo', 20);
            
            $table->bigInteger('mae')->nullable()->unsigned();
            $table->foreign('mae')->nullable()->unsigned()
                ->references('id')
                ->on('animais');
            ;

            $table->bigInteger('pai')->nullable()->unsigned();
            $table->foreign('pai')->nullable()->unsigned()
                ->references('id')
                ->on('animais');
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
        Schema::dropIfExists('embrioes');
    }
}
