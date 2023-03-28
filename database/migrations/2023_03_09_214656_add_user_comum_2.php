<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Security\Role;

class AddUserComum2 extends Migration
{
    public function up()
    {
        $role = new Role();
        $role->name = 'Usuário_comum2';
        $role->save();

        $user = new User();
        $user->role_id = 9;
        $user->imagem = 'public\images\avatars\admin.jpg';
        $user->name = 'Usuário comum para testes';
        $user->email = 'user2@gmail.com';
        $user->password = bcrypt('user2@gmail.com');
        $user->save();
    }

    public function down()
    {
        \DB::statement("SET foreign_key_checks=0");
        \DB::table('users')->truncate();
        \DB::table('roles')->truncate();
        \DB::statement("SET foreign_key_checks=1");
    }
}
