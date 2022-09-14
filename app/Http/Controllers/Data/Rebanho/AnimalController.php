<?php

namespace App\Http\Controllers\Data\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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

            
            $user->save();

            if (isset($request->imagem)) {
                $data = Carbon::now();
                $path = '/arquivos/users/';
                $arquivo = $user->id
                    . $data->format("_Y-m-d-H-i-s")
                    . '.'
                    . $request->imagem->getClientOriginalExtension()
                ;
                $request->imagem->move(public_path() . $path, $arquivo);
                $user->imagem = "{$path}/{$arquivo}";
                $user->save();
            }

            $notification = array(
                'title' => 'Parabéns!',
                'message' => 'Usuário Salvo com Sucesso',
                'icon' => 'success',
                'returnUrl' => url('/security/users')
            );
            return view('shared.notificationWindowTop', compact('notification'));
           
            return $user;
          }catch (Exception $ex) {
            $notification = array(
                'title' => 'Oops!',
                'message' => "Ocorreu um Erro ao salvar o Animal! " . htmlentities($ex->getMessage()),
                'icon' => 'error'
            );
              return view('shared.notificationWindowTop', compact('notification'));
         }
        }else {
            $message = [];
            $errors = $validate->errors();
            foreach($errors->all() as $item ) {
                $message[] = $item;
            }

            $notification = array(
                'title' => 'Oops!',
                'message' => "Ocorreu um Erro ao salvar o Usuário!<br> " . implode('<br>', $message),
                'icon' => 'error'
            );
            return view('shared.notificationWindowTop', compact('notification'));
        }    
        //Precisa fazer a validação do e-mail  duplicado (já existente na tabela)
    }
}