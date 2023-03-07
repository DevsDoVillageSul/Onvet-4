<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Tanque;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class TanqueController extends Controller
{
    protected $model = Tanque::class;
    public function save(Request $request)
    {
        try {
            $tanque = $this->model::findOrNew($request->id);
            $tanque->nome = $request->nome;

            $tanque->fill($request->all());
            $tanque->setAttribute('user_id', Auth::user()->id);
            $tanque->fazenda_id = $request->fazenda_id;

            $tanque->litros = $request->litros;
            $tanque->observacao = $request->observacao;
            $tanque->ativo = $request->ativo ?? 0;
            $tanque->save();
            return $tanque;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Tanque!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}