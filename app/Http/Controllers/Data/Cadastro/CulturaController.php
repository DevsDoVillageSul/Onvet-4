<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Cultura;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
class CulturaController extends Controller
{
    protected $model = Cultura::class;
    public function save(Request $request)
    {
        try {
            $cultura = $this->model::findOrNew($request->id);
            $cultura->nome = $request->nome;

            $cultura->fill($request->all());
            $cultura->setAttribute('user_id', Auth::user()->id);
            $cultura->fazenda_id = $request->fazenda_id;

            $cultura->tipo = $request->tipo;
            $cultura->dt_ini = $request->dt_ini;
            $cultura->dt_fim = $request->dt_fim;
            $cultura->ha = $request->ha;
            $cultura->custo = $request->custo;
            $cultura->total = $request->total;
            $cultura->observacao = $request->observacao;
            $cultura->ativo = $request->ativo ?? 0;
            $cultura->save();
            return $cultura;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a Cultura!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}