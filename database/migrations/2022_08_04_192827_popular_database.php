<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopularDatabase extends Migration
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
        DB::table('funcionario')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Gabriel',
                    'cpf' => '999.999.999-99',
                    'dt_nasc' => '04/03/1998',
                    'sexo' => 'Masculino',
                    'funcao' => 'Desenvolvedor',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 9',
                    'numero' => '12',
                    'complemento' => 'Quadra 9, Lote 5',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('tanques')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Tanque número 1',
                    'litros' => '255',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('areas')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Área norte',
                    'dt_ini' => '22/03/2021',
                    'dt_fim' => '04/05/2022',
                    'tipo' => 'ARRENDADA',
                    'ha' => '12',
                    'util' => '2',
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('culturas')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Cultura Sudoeste',
                    'dt_ini' => '01/01/2019',
                    'dt_fim' => '22/01/2022',
                    'tipo' => 'CANAVIAL',
                    'ha' => '10',
                    'custo' => '12000',
                    'total' => '120000',
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('pastagem')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Pastagem inicial',
                    'dt_ini' => '22/02/2021',
                    'dt_fim' => '05/12/2021',
                    'area' => '33',
                    'tipo' => 'ANUAL',
                    'custo' => '9000',
                    'total' => '297000',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('tes')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Primeiro protocolo TE',
                    'desc' => 'Populando a base de dados para testes',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('inducoes')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Primeiro protocolo indução a lactação',
                    'desc' => 'Populando a base de dados para testes',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('iatfs')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Primeiro protocolo IATF',
                    'desc' => 'Populando a base de dados para testes',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('lotes')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Lote girolando',
                    'desc' => 'Populando a base de dados para testes',
                    'abv' => 'Gir',
                    'sexo' => 'MISTO',
                    'fase' => 'RECRIA',
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
        Schema::table('funcionario', function (Blueprint $table) {
            //
        });
        Schema::table('tanques', function (Blueprint $table) {
            //
        });
        Schema::table('areas', function (Blueprint $table) {
            //
        });
        Schema::table('culturas', function (Blueprint $table) {
            //
        });
        Schema::table('pastagem', function (Blueprint $table) {
            //
        });
        Schema::table('tes', function (Blueprint $table) {
            //
        });
        Schema::table('iatfs', function (Blueprint $table) {
            //
        });
        Schema::table('inducoes', function (Blueprint $table) {
            //
        });
        Schema::table('lotes', function (Blueprint $table) {
            //
        });
    }
}