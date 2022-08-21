<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionDadosDashboard extends Migration
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
                'id' => '22',
                'menu' => '1',
                'position' => '0',
                'permission_id' => 21,
                'name' => 'menu.dados.dashboard',
                'icon' => 'pie-chart',
                'url' => 'dados/dashboard',
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
        DB::table('role_permissions')->where('permission_id', 22)->delete();
    
        DB::table('permissions')->where('id', 22)->delete();
    }
}