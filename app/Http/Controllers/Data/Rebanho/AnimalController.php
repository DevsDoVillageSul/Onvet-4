<?php

namespace App\Http\Controllers\Data\Rebanho;

use App\Http\Controllers\Controller;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use Illuminate\Http\Request;

use Exception;

class AnimalController extends Controller
{
    protected $model = Animal::class;
    public function save(Request $request)
    {
        try {
            $animal = $this->model::findOrNew($request->id);
            $animal->nome = $request->nome;
            $animal->sexo = $request->sexo;
            $animal->sangue =  $request->sangue;
            $animal->raca = $request->raca;
            $animal->brinco = $request->brinco;
            $animal->lote_id = $request->lote_id;
            $animal->fornecedor_id = $request->fornecedor_id;
            $animal->ativo = $request->ativo ?? 0;
            $animal->save();
            return $animal;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Animal!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
