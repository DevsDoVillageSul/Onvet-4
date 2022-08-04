<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Pastagem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class PastagemController extends Controller
{
    protected $model = Pastagem::class;
    public function save(Request $request)
    {
        try {
            $pastagem = $this->model::findOrNew($request->id);
            $pastagem->nome = $request->nome;
            $pastagem->tipo = $request->tipo;
            $pastagem->dt_ini = $request->dt_ini;
            $pastagem->dt_fim = $request->dt_fim;
            $pastagem->area = $request->area;
            $pastagem->custo = $request->custo;
            $pastagem->total = $request->total;
            $pastagem->save();
            return $pastagem;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a pastagem!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}