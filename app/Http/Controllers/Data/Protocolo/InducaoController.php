<?php

namespace App\Http\Controllers\Data\Protocolo;

use App\Http\Controllers\Controller;
use App\Models\Protocolo\Inducao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class InducaoController extends Controller
{
    protected $model = Inducao::class;
    public function save(Request $request)
    {
        try {
            $inducao = $this->model::findOrNew($request->id);
            $inducao->nome = $request->nome;

            $inducao->fill($request->all());
            $inducao->setAttribute('user_id', Auth::user()->id);

            $inducao->desc = $request->desc;
            $inducao->animal_id = $request->animal_id;
            $inducao->dt_prt = $request->dt_prt;
            $inducao->dias_lactacao = $request->dias_lactacao;
            $inducao->save();
            return $inducao;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o protocolo!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}