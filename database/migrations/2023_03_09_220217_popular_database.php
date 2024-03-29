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

        DB::table('fazendas')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Fazenda User 1',
                    'cep' => '75780-000',
                    'endereco' => 'Rua TALTALTAL',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('fazendas')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Fazenda User 2',
                    'cep' => '75780-000',
                    'endereco' => 'Rua ALIALIALI',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('fornecedor')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'Novo Mundo',
                    'cpf' => '',
                    'cnpj' => '01.534.080/0001-28',
                    'razao' => 'Novo Mundo Moveis e Utilidades Ltda',
                    'tipo' => 'externo',
                    'email' => 'novomundo@gmail.com',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 5',
                    'numero' => '1',
                    'complemento' => 'Quadra 12, Lote 1',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('fornecedor')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Agroforte',
                    'cpf' => '',
                    'cnpj' => '05.333.963/0001-20',
                    'razao' => 'AGROFORTE NUTRICAO ANIMAL LTDA',
                    'tipo' => 'externo',
                    'email' => 'agroforte@gmail.com',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 7',
                    'numero' => '1',
                    'complemento' => 'Quadra 10, Lote 5',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('fornecedor')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Jhon dree',
                    'cpf' => '',
                    'cnpj' => '01.534.080/0001-28',
                    'razao' => 'Jhon dree',
                    'tipo' => 'externo',
                    'email' => 'Jhondree@gmail.com',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 5',
                    'numero' => '1',
                    'complemento' => 'Quadra 12, Lote 1',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('fornecedor')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'For Agro',
                    'cpf' => '',
                    'cnpj' => '05.333.963/0001-20',
                    'razao' => 'FOR AGRO',
                    'tipo' => 'externo',
                    'email' => 'foragro@gmail.com',
                    'telefone' => '(99)99999-9999',
                    'cep' => '75780-000',
                    'endereco' => 'Rua VS 7',
                    'numero' => '1',
                    'complemento' => 'Quadra 10, Lote 5',
                    'bairro' => 'Centro',
                    'cidade' => 'Ipameri',
                    'uf' => 'GO',
                    'user_id' => 3,
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
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tanques')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Tanque número 2',
                    'litros' => '2555',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tanques')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Tanque número 3',
                    'litros' => '255',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tanques')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Tanque número 4',
                    'litros' => '255',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
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
                    'dt_ini' => '22-03-2021',
                    'dt_fim' => '04-05-2022',
                    'tipo' => 'ARRENDADA',
                    'ha' => '12',
                    'util' => '2',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('areas')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Área sul',
                    'dt_ini' => '22-03-2021',
                    'dt_fim' => '04-05-2022',
                    'tipo' => 'ARRENDADA',
                    'ha' => '12',
                    'util' => '2',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('areas')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Área leste',
                    'dt_ini' => '22-03-2021',
                    'dt_fim' => '04-05-2022',
                    'tipo' => 'ARRENDADA',
                    'ha' => '12',
                    'util' => '2',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('areas')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Área oeste',
                    'dt_ini' => '22-03-2021',
                    'dt_fim' => '04-05-2022',
                    'tipo' => 'ARRENDADA',
                    'ha' => '12',
                    'util' => '2',
                    'user_id' => 3,
                    'fazenda_id' => 2,
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
                    'dt_ini' => '01-01-2019',
                    'dt_fim' => '22-01-2022',
                    'tipo' => 'CANAVIAL',
                    'ha' => '10',
                    'custo' => '12000',
                    'total' => '120000',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('culturas')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Cultura Norte',
                    'dt_ini' => '01-01-2019',
                    'dt_fim' => '22-01-2022',
                    'tipo' => 'CANAVIAL',
                    'ha' => '10',
                    'custo' => '12000',
                    'total' => '120000',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('culturas')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Cultura Sul',
                    'dt_ini' => '01-01-2019',
                    'dt_fim' => '22-01-2022',
                    'tipo' => 'CANAVIAL',
                    'ha' => '10',
                    'custo' => '12000',
                    'total' => '120000',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );
        DB::table('culturas')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Cultura Oeste',
                    'dt_ini' => '01-01-2019',
                    'dt_fim' => '22-01-2022',
                    'tipo' => 'CANAVIAL',
                    'ha' => '10',
                    'custo' => '12000',
                    'total' => '120000',
                    'user_id' => 3,
                    'fazenda_id' => 2,
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
                    'dt_ini' => '22-02-2021',
                    'dt_fim' => '05-12-2021',
                    'area' => '33',
                    'tipo' => 'ANUAL',
                    'custo' => '9000',
                    'total' => '297000',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('pastagem')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Pastagem natural',
                    'dt_ini' => '22-02-2021',
                    'dt_fim' => '05-12-2021',
                    'area' => '55',
                    'tipo' => 'NATURAL',
                    'custo' => '15000',
                    'total' => '825000',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('pastagem')->insert(
            [
                [
                    'id' =>3,
                    'nome' => 'Pastagem inicial',
                    'dt_ini' => '22-02-2021',
                    'dt_fim' => '05-12-2021',
                    'area' => '33',
                    'tipo' => 'ANUAL',
                    'custo' => '9000',
                    'total' => '297000',
                    'user_id' => 2,
                    'fazenda_id' => 1,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('pastagem')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Pastagem inicial',
                    'dt_ini' => '22-02-2021',
                    'dt_fim' => '05-12-2021',
                    'area' => '33',
                    'tipo' => 'ANUAL',
                    'custo' => '9000',
                    'total' => '297000',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('pastagem')->insert(
            [
                [
                    'id' => 5,
                    'nome' => 'Pastagem inicial',
                    'dt_ini' => '22-02-2021',
                    'dt_fim' => '05-12-2021',
                    'area' => '33',
                    'tipo' => 'ANUAL',
                    'custo' => '9000',
                    'total' => '297000',
                    'user_id' => 3,
                    'fazenda_id' => 2,
                    'ativo' => '1',
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
                    'animal_id' => 1,
                    'animais_id' => 4,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tes')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Segundo protocolo TE',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 2,
                    'animais_id' => 5,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tes')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Terceiro protocolo TE',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 3,
                    'animais_id' => 4,
                    'user_id' => 3,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('tes')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Quarto protocolo TE',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 1,
                    'animais_id' => 5,
                    'user_id' => 3,
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
                    'dt_prt' => '2023-01-01',
                    'dias_lactacao' => '4',
                    'animal_id' => 1,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('inducoes')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Segundo protocolo indução a lactação',
                    'desc' => 'Populando a base de dados para testes',
                    'dt_prt' => '2023-01-01',
                    'dias_lactacao' => '4',
                    'animal_id' => 2,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('inducoes')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Terceiro protocolo indução a lactação',
                    'desc' => 'Populando a base de dados para testes',
                    'dt_prt' => '2023-01-01',
                    'dias_lactacao' => '4',
                    'animal_id' => 3,
                    'user_id' => 3,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('inducoes')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Quarto protocolo indução a lactação',
                    'desc' => 'Populando a base de dados para testes',
                    'dt_prt' => '2023-01-01',
                    'dias_lactacao' => '4',
                    'animal_id' => 4,
                    'user_id' => 3,
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
                    'animal_id' => 1,
                    'animais_id' => 4,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('iatfs')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Segundo protocolo IATF',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 2,
                    'animais_id' => 4,
                    'user_id' => 2,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('iatfs')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Terceiro protocolo IATF',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 3,
                    'animais_id' => 5,
                    'user_id' => 3,
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('iatfs')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Quarto protocolo IATF',
                    'desc' => 'Populando a base de dados para testes',
                    'animal_id' => 3,
                    'animais_id' => 4,
                    'user_id' => 3,
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
                    'sexo' => 'MACHO',
                    'fase' => 'RECRIA',
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('lotes')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'Lote anelorado',
                    'desc' => 'Populando a base de dados para testes',
                    'abv' => 'Nelore',
                    'sexo' => 'MISTO',
                    'fase' => 'CRIA',
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('lotes')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'Lote angus',
                    'desc' => 'Populando a base de dados para testes',
                    'abv' => 'Angus',
                    'sexo' => 'MISTO',
                    'fase' => 'PRODUCAO',
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('lotes')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'Lote girolando 2',
                    'desc' => 'Populando a base de dados para testes',
                    'abv' => 'Gir',
                    'sexo' => 'MACHO',
                    'fase' => 'RECRIA',
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('animais')->insert(
            [
                [
                    'id' => 1,
                    'video' => '',
                    'imagem' => 1,
                    'nome' => 'MARRUCO',
                    'sexo' => 'MACHO',
                    'sangue' => '1/2',
                    'raca' => 'ANGUS',
                    'brinco' => 16,
                    'origem' => 'COMPRA',
                    'dt_nasc' => '19-08-2017',
                    'peso' => '1235',
                    'nome_reg' => 'Baseado',
                    'num_reg' => '1',
                    'raca_2' => 'GIR',
                    'pelagem' => 'Clara',
                    'dt_entrada' => '21-08-22',
                    'peso_entrada' => '1250',
                    'cat_macho' => 'MACHOS 12 - 24 MESES',
                    'cat_femea' => '',
                    'valor' => '6000',
                    'desmame' => '1',
                    'parida' => '',
                    'num_cria' => 16,
                    'dt_parto' => '',
                    'reg_parto' => '',
                    'new_cria' => '',
                    'brinco_cria' => 16,
                    'nome_cria' => '',
                    'sexo_cria' => '',
                    'raca_cria' => '',
                    'lote_id' => '1',
                    'fornecedor_id' => '1',
                    'fazenda_id' => 1,
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('animais')->insert(
            [
                [
                    'id' => 2,
                    'video' => '',
                    'imagem' => 4,
                    'nome' => 'BRABO',
                    'sexo' => 'MACHO',
                    'sangue' => '1/2',
                    'raca' => 'GIR',
                    'brinco' => 15,
                    'origem' => 'COMPRA',
                    'dt_nasc' => '19-08-2017',
                    'peso' => '1235',
                    'nome_reg' => 'BRABO',
                    'num_reg' => '1',
                    'raca_2' => 'GIR',
                    'pelagem' => 'Clara',
                    'dt_entrada' => '21-08-22',
                    'peso_entrada' => '1250',
                    'cat_macho' => 'MACHOS 12 - 24 MESES',
                    'cat_femea' => '',
                    'valor' => '6000',
                    'desmame' => '1',
                    'parida' => '',
                    'num_cria' => 15,
                    'dt_parto' => '',
                    'reg_parto' => '',
                    'new_cria' => '',
                    'brinco_cria' => 15,
                    'nome_cria' => '',
                    'sexo_cria' => '',
                    'raca_cria' => '',
                    'lote_id' => '1',
                    'fornecedor_id' => '1',
                    'fazenda_id' => 1,
                    'user_id' => 2,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('animais')->insert(
            [
                [
                    'id' => 3,
                    'video' => '',
                    'imagem' => 5,
                    'nome' => 'BRUTÃO',
                    'sexo' => 'MACHO',
                    'sangue' => '1/2',
                    'raca' => 'ANELORADO',
                    'brinco' => 14,
                    'origem' => 'COMPRA',
                    'dt_nasc' => '19-08-2017',
                    'peso' => '1235',
                    'nome_reg' => 'Baseado',
                    'num_reg' => '1',
                    'raca_2' => 'GIR',
                    'pelagem' => 'Clara',
                    'dt_entrada' => '21-08-22',
                    'peso_entrada' => '1250',
                    'cat_macho' => 'MACHOS 12 - 24 MESES',
                    'cat_femea' => '',
                    'valor' => '6000',
                    'desmame' => '1',
                    'parida' => '',
                    'num_cria' => 14,
                    'dt_parto' => '',
                    'reg_parto' => '',
                    'new_cria' => '',
                    'brinco_cria' => 14,
                    'nome_cria' => '',
                    'sexo_cria' => '',
                    'raca_cria' => '',
                    'lote_id' => '1',
                    'fornecedor_id' => '1',
                    'fazenda_id' => 2,
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('animais')->insert(
            [
                [
                    'id' => 4,
                    'video' => '',
                    'imagem' => 2,
                    'nome' => 'MIMOSA',
                    'sexo' => 'FEMEA',
                    'sangue' => '1/4',
                    'raca' => 'ANELORADO',
                    'brinco' => 22,
                    'origem' => 'COMPRA',
                    'dt_nasc' => '09-01-2018',
                    'peso' => '1120',
                    'nome_reg' => 'Mimosa',
                    'num_reg' => '2',
                    'raca_2' => 'GIR LEITEIRO',
                    'pelagem' => 'Escura',
                    'dt_entrada' => '21-08-22',
                    'peso_entrada' => '1176',
                    'cat_macho' => '',
                    'cat_femea' => 'FEMEAS ACIMA DE 24 MESES',
                    'valor' => '5000',
                    'desmame' => '1',
                    'parida' => 'SIM',
                    'num_cria' => '2',
                    'dt_parto' => '2023-01-01',
                    'reg_parto' => 'NORMAL',
                    'new_cria' => 'SIM',
                    'brinco_cria' => '5',
                    'nome_cria' => 'BRABINHO',
                    'sexo_cria' => 'MACHO',
                    'raca_cria' => 'PARDO SUICO',
                    'lote_id' => '1',
                    'fornecedor_id' => '1',
                    'fazenda_id' => 2,
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('animais')->insert(
            [
                [
                    'id' => 5,
                    'video' => '',
                    'imagem' => 3,
                    'nome' => 'JOANA',
                    'sexo' => 'FEMEA',
                    'sangue' => '1/4',
                    'raca' => 'ANELORADO',
                    'brinco' => 34,
                    'origem' => 'COMPRA',
                    'dt_nasc' => '09-01-2018',
                    'peso' => '2000',
                    'nome_reg' => 'Joana',
                    'num_reg' => '3',
                    'raca_2' => 'GIR LEITEIRO',
                    'pelagem' => 'Escura',
                    'dt_entrada' => '21-08-22',
                    'peso_entrada' => '999',
                    'cat_macho' => '',
                    'cat_femea' => 'FEMEAS ACIMA DE 24 MESES',
                    'valor' => '5000',
                    'desmame' => '1',
                    'parida' => 'SIM',
                    'num_cria' => '2',
                    'dt_parto' => '2023-01-01',
                    'reg_parto' => 'NORMAL',
                    'new_cria' => 'SIM',
                    'brinco_cria' => '5',
                    'nome_cria' => 'JOANINHO',
                    'sexo_cria' => 'MACHO',
                    'raca_cria' => 'PARDO SUICO',
                    'lote_id' => '1',
                    'fornecedor_id' => '1',
                    'fazenda_id' => 2,
                    'user_id' => 3,
                    'ativo' => '1',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('embrioes')->insert(
            [
                [
                    'id' => 1,
                    'nome' => 'AB',
                    'tipo' => 'VITRO',
                    'congelamento' => 'VITRIFICACAO',
                    'grau' => 'MO',
                    'animal_id' => 2,
                    'animais_id' => 5,
                    'user_id' => 2,
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('embrioes')->insert(
            [
                [
                    'id' => 2,
                    'nome' => 'AD',
                    'tipo' => 'VITRO',
                    'congelamento' => 'VITRIFICACAO',
                    'grau' => 'MO',
                    'animal_id' => 1,
                    'animais_id' => 4,
                    'user_id' => 2,
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('embrioes')->insert(
            [
                [
                    'id' => 3,
                    'nome' => 'AC',
                    'tipo' => 'VIVO',
                    'congelamento' => 'VITRIFICACAO',
                    'grau' => 'BX',
                    'animal_id' => 1,
                    'animais_id' => 5,
                    'user_id' => 3,
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('embrioes')->insert(
            [
                [
                    'id' => 4,
                    'nome' => 'AC',
                    'tipo' => 'VIVO',
                    'congelamento' => 'VITRIFICACAO',
                    'grau' => 'BX',
                    'animal_id' => 3,
                    'animais_id' => 4,
                    'user_id' => 3,
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('semens')->insert(
            [
                [
                    'id' => 1,
                    'registro' => '9983',
                    'nome' => 'SEMEN USER 1',
                    'raca' => 'BRAFORD',
                    'central' => 'Central de Teste',
                    'tipos' => '["Convencional","Sexado Macho"]',
                    'animal_id' => 1,
                    'animais_id' => 4,
                    'user_id' => 2,
                    'sangue' => '3/4',
                    'raca_2' => 'GIR',
                    'partida' => '9',
                    'tec' => 'João',
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('semens')->insert(
            [
                [
                    'id' => 2,
                    'registro' => '998',
                    'nome' => 'SEMEN USER 1',
                    'raca' => 'BRAFORD',
                    'central' => 'Central de Teste',
                    'tipos' => '["Sexado F\u00eamea"]',
                    'animal_id' => 1,
                    'animais_id' => 5,
                    'user_id' => 2,
                    'sangue' => '3/4',
                    'raca_2' => 'GIR',
                    'partida' => '9',
                    'tec' => 'Gabriel',
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('semens')->insert(
            [
                [
                    'id' => 3,
                    'registro' => '111',
                    'nome' => 'SEMEN USER 2',
                    'raca' => 'BRAFORD',
                    'central' => 'Central de Teste',
                    'tipos' => '["Sexado F\u00eamea"]',
                    'animal_id' => 3,
                    'animais_id' => 4,
                    'user_id' => 3,
                    'sangue' => '3/4',
                    'raca_2' => 'GIR',
                    'partida' => '9',
                    'tec' => 'Gabriel',
                    'observacao' => '',
                    'created_at' => '2022-08-03 16:55:45',
                    'updated_at' => '2022-08-03 16:55:45'
                ]
            ]
        );

        DB::table('semens')->insert(
            [
                [
                    'id' => 4,
                    'registro' => '1324',
                    'nome' => 'SEMEN USER 2',
                    'raca' => 'BRAFORD',
                    'central' => 'Central de Teste',
                    'tipos' => '["Sexado F\u00eamea"]',
                    'animal_id' => 2,
                    'animais_id' => 5,
                    'user_id' => 3,
                    'sangue' => '3/4',
                    'raca_2' => 'GIR',
                    'partida' => '9',
                    'tec' => 'Gabriel',
                    'observacao' => '',
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
        Schema::table('animais', function (Blueprint $table) {
            //
        });
        Schema::table('semens', function (Blueprint $table) {
            //
        });
        Schema::table('embrioes', function (Blueprint $table) {
            //
        });
        Schema::table('fazendas', function (Blueprint $table) {
            //
        });
    }
}