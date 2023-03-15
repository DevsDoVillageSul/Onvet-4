<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            [
                [
                    'id' => 9,
                    'name' => 'Usuario',
                    'created_at' => '2022-01-26 16:55:45',
                    'updated_at' => '2022-01-26 16:55:45'
                ],
            ]
        );

        DB::table('role_permissions')->insert(
            [
                [
                    'role_id' => 9,
                    'permission_id' => 22
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 23
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 4
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 14
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 6
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 13
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 15
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 12
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 24
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 5
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 11
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 10
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 8
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 7
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 9
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 16
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 18
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 17
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 19
                ],
                [
                    'role_id' => 9,
                    'permission_id' => 20
                ],
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
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
