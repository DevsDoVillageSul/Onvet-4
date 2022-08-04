<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('fornecedor')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Novo Mundo',
                    'cpf' => 'null',
                    'cnpj' => '01.534.080/0001-28',
                    'razao' => 'Novo Mundo Moveis e Utilidades Ltda',
                    'tipo' => 'Fornecedor externo',
                    'email' => 'novomundo@gmail.com',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 5',
                    'numero' => '1',
                    'complemento' => 'Quadra 12, Lote 1',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedor', function (Blueprint $table) {
            //
        });
    }
}