<?php

namespace App\Http\Controllers\Data\Duvida;

use App\Http\Controllers\Controller;
use App\Models\Duvida\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Exception;

class FaqController extends Controller
{
    protected $model = Faq::class;
    public function save(Request $request)
    {
        try {
            $faq = $this->model::findOrNew($request->id);
            $faq->pergunta = $request->pergunta;
            $faq->resposta = $request->resposta;

            $faq->fill($request->all());
            $faq->setAttribute('user_id', Auth::user()->id);

            $faq->ativo = $request->ativo ?? 0;
            $faq->save();
            return $faq;
        } catch (Exception $ex) {
            return response()->json([
                'mess1age' => 'Ocorreu um Erro ao salvar o Faq!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
