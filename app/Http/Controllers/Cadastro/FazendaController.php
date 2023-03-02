<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Fazenda;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class FazendaController extends Controller
{
    protected $model = Fazenda::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/fazendas", 'name' => "Fazendas"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $fazendas = Fazenda::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
            ->orderBy('nome', 'ASC');

                // Se o ID do usuário autenticado for 1, obter todas as fazendas
    if ($user_id == 1) {
        $fazendas = Fazenda::filtros($request)
            ->orderBy('nome', 'ASC');
    } else {
        $fazendas = Fazenda::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
            ->orderBy('nome', 'ASC');
    }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($fazendas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($fazendas);
        }
        $fazendas = $fazendas
            ->with('user:id,name')
            ->paginate(config('app.paginate'));

        $resume = $this->model::filtros($request)
            ->select(
                DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
                DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
            )
            ->where('id', '>', 1)
            ->first();

        $dataView = compact('breadcrumbs', 'request', 'fazendas', 'resume');
        return view('modules/cadastro/fazenda/index', $dataView);
    }
    private function indexPdf($fazendas)
    {
        $fazendas = $fazendas->get();
        return \PDF::loadView('modules/cadastro/fazenda/indexPdf', compact('fazendas'))
            ->setPaper('a4')
            ->download('Fazendas.pdf')
        ;
    }

    private function indexExcel($fazendas)
    {
        $fazendas = $fazendas->get();
        $view = 'modules/cadastro/fazenda/indexExcel';
        $arquivo = 'Fazendas.xlsx';
        $dados = ['fazendas' => $fazendas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $fazendas = $this->model::findOrFail($id);
            $fazendas->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/fazendas');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::select('id', 'name')->orderBy('name')->get();
        $fazenda = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'fazenda', 'users');
        return view('modules/cadastro/fazenda/create', $dataView);

    }

    public function show($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $fazenda = $this->model::findOrFail($id);
        $viewData = compact('breadcrumbs', 'fazenda');
        return view('modules/rebanho/fazenda/show', $viewData);
    }
}