<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Exception;

class FazendaController extends Controller
{
    protected $model = Fazenda::class;
    public function save(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'lote_id' => 'required',
        ]);
        if (!$validate->fails()) {
        try {
            $fazenda = $this->model::findOrNew($request->id);
            //itens novos para verificar id do usuário logado
            $fazenda->fill($request->all());
            $fazenda->user_id = Auth::id(); // Obter o id do usuário autenticado

            //itens da tabela
            $fazenda->nome = $request->nome;
            $fazenda->video = $request->video;
            $fazenda->cep = $request->cep;
            $fazenda->endereco = $request->endereco;
            $fazenda->cidade = $request->cidade;
            $fazenda->uf = $request->uf;
            $fazenda->ativo = $request->ativo ?? 0;

            $fazenda->save();

            if (isset($request->imagem)) {
                $data = Carbon::now();
                $path = '/arquivos/rebanhos/';
                $arquivo = $fazenda->id
                    . $data->format("_Y-m-d-H-i-s")
                    . '.'
                    . $request->imagem->getClientOriginalExtension()
                ;
                $request->imagem->move(public_path() . $path, $arquivo);
                $fazenda->imagem = "{$path}/{$arquivo}";
                $fazenda->save();
            }

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
                'message' => 'Ocorreu um Erro ao salvar o Fornecedor !',
                'exception' => $ex->getMessage()
            ], 404);
        } 
    }else {
            $message = [];
            $errors = $validate->errors();
            foreach($errors->all() as $item ) {
                $message[] = $item;
            }

            $notification = array(
                'title' => 'Oops!',
                'message' => "Ocorreu um Erro ao salvar a Fazenda!<br> " . implode('<br>', $message),
                'icon' => 'error'
            );
            return view('shared.notificationWindowTop', compact('notification'));
        }    
    }
}
