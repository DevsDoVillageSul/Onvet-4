<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissaoCadastrosFazendas extends Migration
{
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '24',
                'menu' => '1',
                'position' => '9',
                'permission_id' => 1,
                'name' => 'menu.cadastros.fazendas',
                'icon' => 'feather',
                'url' => 'cadastros/fazendas',
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
        DB::table('role_permissions')->where('permission_id', 24)->delete();

        DB::table('permissions')->where('id', 24)->delete();
    }
}
