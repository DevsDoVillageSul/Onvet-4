<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Security\Role;

class AddUserGabi extends Migration
{
    public function up()
    {
        $role = new Role();
        $role->name = 'Gabi';
        $role->save();

        $user = new User();
        $user->role_id = 9;
        $user->imagem = 'public\images\avatars\admin.jpg';
        $user->name = 'Gabriela';
        $user->email = 'gabrielavet@gmail.com';
        $user->password = bcrypt('gabrielavet@gmail.com');
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
