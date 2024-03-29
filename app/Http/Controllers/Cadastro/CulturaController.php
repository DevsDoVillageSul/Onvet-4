<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Cultura;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CulturaController extends Controller
{
    protected $model = Cultura::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/culturas", 'name' => "Culturas"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $culturas = Cultura::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (auth()->user()->role_id == 1) {
            $resume = $this->model::filtros($request)
                ->select(
                    DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
                    DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
                )
                ->where('id', '>', 0)
                ->first();
        } else {
            $resume = $this->model::filtros($request)
                ->select(
                    DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
                    DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
                )
                ->where('id', '>', 0)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->first();

        }

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $culturas = Cultura::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $culturas = Cultura::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($culturas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($culturas);
        }

        $culturas = $culturas
        ->with('user:id,name')
        ->paginate(config('app.paginate'));

        $dataView = compact('breadcrumbs', 'request', 'culturas','resume');
        return view('modules/cadastro/cultura/index', $dataView);  
    }

    public function destroy($id)
    {
        try {
            $cultura = $this->model::findOrFail($id);
            $cultura->delete();
            session()->flash('flash_message', 'A cultura foi apagada com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover a Cultura!');
        }
        return redirect('cadastros/culturas');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $cultura = $this->model::findOrNew($id);
        $users = User::select('id', 'name')->orderBy('name')->get();
      
        if(Auth::user()->role_id == 1) {
            // Se o usuário tem a role 1, mostre todas as fazendas
            $fazendas = Fazenda::all();
        } else {
            // Se não, mostre apenas as fazendas do usuário logado
            $user_id = Auth::id();
            $fazendas = Fazenda::where(function($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhereNull('user_id');
            })->get();
        }
        $dataView = compact('breadcrumbs', 'cultura','users','fazendas');
        return view('modules/cadastro/cultura/create', $dataView);       
    }

    private function indexPdf($culturas)
    {
        $culturas = $culturas->get();
        return \PDF::loadView('modules/cadastro/cultura/indexPdf', compact('culturas'))
            ->setPaper('a4')
            ->download('Culturas.pdf')
        ;
    }

    private function indexExcel($culturas)
    {
        $culturas = $culturas->get();
        $view = 'modules/cadastro/cultura/indexExcel';
        $arquivo = 'Culturas.xlsx';
        $dados = ['culturas' => $culturas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}
