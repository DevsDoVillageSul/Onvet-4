<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Exception;

class FazendaController extends Controller
{
    protected $model = Fazenda::class;
    public function save(Request $request)
    {
        try {
            $fazenda = $this->model::findOrNew($request->id);
            
            $fazenda->fill($request->all());
            $fazenda->setAttribute('user_id', Auth::user()->id);
            
            $fazenda->nome = $request->nome;
            $fazenda->cep = $request->cep;
            $fazenda->endereco = $request->endereco;
            $fazenda->cidade = $request->cidade;
            $fazenda->uf = $request->uf;
            $fazenda->ativo = $request->ativo ?? 0;
            $fazenda->save();

            $notification = array(
                'title' => 'Parabéns!',
                'message' => 'Fazenda Salva com Sucesso',
                'icon' => 'success',
                'returnUrl' => url('cadastros/fazendas')
            );

            return view('shared.notificationWindowTop', compact('notification'));

            return $fazenda;

        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a fazenda !',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}