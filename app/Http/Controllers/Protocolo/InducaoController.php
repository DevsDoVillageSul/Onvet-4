<?php

namespace App\Http\Controllers\Protocolo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Protocolo\Inducao;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rebanho\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InducaoController extends Controller
{
    protected $model = Inducao::class;

    protected $breadcrumbs = [
        ['name' => "Protocolos"],
        ['link' => "/protocolos/inducoes", 'name' => "Cadastrar protocolos indução"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $inducoes = Inducao::filtros($request)        
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado    
        ->orderBy('id', 'DESC')
        ;

         // permite que o usuário com role_id = 1 veja todos os dados
         if (auth()->user()->role_id == 1) {
            $inducoes = Inducao::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $inducoes = Inducao::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($inducoes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($inducoes);
        }

        $inducoes = $inducoes
        ->with('animal:id,nome')
        ->with('user:id,name')
        ->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'inducoes');
        return view('modules/protocolo/inducao/index', $dataView);  
    }

    private function indexPdf($inducoes)
    {
        $inducoes = $inducoes->get();
        return \PDF::loadView('modules/protocolo/inducao/indexPdf', compact('inducoes'))
            ->setPaper('a4')
            ->download('Inducao.pdf')
        ;
    }

    private function indexExcel($inducoes)
    {
        $inducoes = $inducoes->get();
        $view = 'modules/protocolo/inducao/indexExcel';
        $arquivo = 'inducao.xlsx';
        $dados = ['inducoes' => $inducoes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $inducao = $this->model::findOrFail($id);
            $inducao->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('protocolos/inducoes');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::select('id', 'name')->orderBy('name')->get();
        $inducao = $this->model::findOrNew($id);
        //$animais = Animal::select('id', 'nome')->orderBy('nome')->get();

        if(Auth::user()->role_id == 1) {
            // Se o usuário tem a role 1, mostre todas as fazendas
            $animais = Animal::all();
        } else {
            // Se não, mostre apenas as fazendas do usuário logado
            $user_id = Auth::id();
            $animais = Animal::where(function($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhereNull('user_id');
            })->get();
        }


        $dataView = compact('breadcrumbs', 'inducao','animais','users');
        return view('modules/protocolo/inducao/create', $dataView);       
    }
}
