<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Pastagem;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class PastagemController extends Controller
{
    protected $model = Pastagem::class;
    public function save(Request $request)
    {   
        try {
            $pastagem = $this->model::findOrNew($request->id);
            $pastagem->nome = $request->nome;

            $pastagem->fill($request->all());
            $pastagem->setAttribute('user_id', Auth::user()->id);
            $pastagem->fazenda_id = $request->fazenda_id;

            $pastagem->tipo = $request->tipo;
            $pastagem->dt_ini = $request->dt_ini;
            $pastagem->dt_fim = $request->dt_fim;
            $pastagem->area = $request->area;
            $pastagem->custo = $request->custo;
            $pastagem->total = $request->total;
            $pastagem->observacao = $request->observacao;
            $pastagem->ativo = $request->ativo ?? 0;
            $pastagem->save();
            return $pastagem;
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex ->getMessage(),
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}