<?php

namespace App\Http\Controllers\Data\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Exception;

class UserController extends Controller
{
    protected $model = User::class;
    public function save(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'role_id' => 'required',
            'home_id' => 'required',
            'email' => 'required|max:255', 
            
        ]);

        if ($validate->fails()) {
            return response()->json($validate->messages(), 400);
        }
        //Precisa fazer a validação do e-mail  duplicado (já existente na tabela)
        try {
            $user = $this->model::findOrNew($request->id);
            $user->name = $request->name;
            $user->jobtitle = $request->jobtitle;
            $user->role_id  = $request->role_id;
            $user->home_id  = $request->home_id;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->cellphone = $request->cellphone;
            $user->active = $request->ativo ?? 0;

            if($request->password != "") {
                $user->password = bcrypt($request->password);
            }


            $user->save();
            return $user;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Usuário',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
