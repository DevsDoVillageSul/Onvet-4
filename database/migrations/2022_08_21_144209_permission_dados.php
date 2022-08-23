<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('permissions')->insert(
            [
                'id' => '21',
                'menu' => '1',
                'position' => '0',
                'permission_id' => null,
                'name' => 'menu.dados',
                'icon' => 'database',
                'url' => '',
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
        DB::table('role_permissions')->where('permission_id', 21)->delete();

        DB::table('permissions')->where('id',21)->delete();
    }
}
