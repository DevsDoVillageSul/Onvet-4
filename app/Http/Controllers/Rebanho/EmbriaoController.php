<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Embriao;
use App\Models\Rebanho\Animal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmbriaoController extends Controller
{
    protected $model = Embriao::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Embriões"],
        ['link' => "/rebanho/embrioes", 'name' => "Embrioes"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $embrioes = Embriao::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado    
            ->orderBy('nome', 'ASC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $embrioes = Embriao::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $embrioes = Embriao::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($embrioes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($embrioes);
        }

        $embrioes = $embrioes
            ->with('user:id,name')
            ->with('animal:id,nome', 'animais:id,nome')
            ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'embrioes');
        return view('modules/rebanho/embriao/index', $dataView);
    }

    private function indexPdf($embrioes)
    {
        $embrioes = $embrioes->get();
        return \PDF::loadView('modules/rebanho/embriao/indexPdf', compact('embrioes'))
            ->setPaper('a4')
            ->download('Embrioes.pdf')
        ;
    }

    private function indexExcel($embrioes)
    {
        $embrioes = $embrioes->get();
        $view = 'modules/rebanho/embriao/indexExcel';
        $arquivo = 'Embrioes.xlsx';
        $dados = ['embrioes' => $embrioes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $embriao = $this->model::findOrNew($id);
        $users = User::select('id', 'name')->orderBy('name')->get();

        // Condições adicionadas para filtrar a tabela Animais
        if (Auth::user()->role_id == 1) {
            $animais = Animal::select('id', 'nome')->where('sexo', '=', 'MACHO')->orderBy('nome')->get();
            $animais2 = Animal::select('id', 'nome')->where('sexo', '=', 'FEMEA')->orderBy('nome')->get();
        } else {
            $user_id = Auth::id();
            $animais = Animal::select('id', 'nome')
                ->where(function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)
                        ->orWhereNull('user_id');
                })
                ->where('sexo', '=', 'MACHO')
                ->orderBy('nome')
                ->get();

            $animais2 = Animal::select('id', 'nome')
                ->where(function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)
                        ->orWhereNull('user_id');
                })
                ->where('sexo', '=', 'FEMEA')
                ->orderBy('nome')
                ->get();
        }

        $dataView = compact('breadcrumbs', 'embriao', 'animais', 'animais2','users');
        return view('modules/rebanho/embriao/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $embriao = $this->model::findOrFail($id);
            $embriao->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/embrioes');
    }
}