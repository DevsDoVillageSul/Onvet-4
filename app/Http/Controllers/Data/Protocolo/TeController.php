<?php

namespace App\Http\Controllers\Data\Protocolo;

use App\Http\Controllers\Controller;
use App\Models\Protocolo\Te;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class TeController extends Controller
{
    protected $model = Te::class;
    public function save(Request $request)
    {
        try {
            $te = $this->model::findOrNew($request->id);
            $te->nome = $request->nome;

            $te->fill($request->all());
            $te->setAttribute('user_id', Auth::user()->id);

            $te->desc = $request->desc;
            $te->animal_id = $request->animal_id;
            $te->animais_id = $request->animais_id;
            $te->save();
            return $te;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o protocolo!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}