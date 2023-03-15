<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Area;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    protected $model = Area::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/areas", 'name' => "Áreas"]
    ];

    public function index(Request $request)
    {

        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $areas = Area::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado       
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
            $areas = Area::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $areas = Area::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($areas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($areas);
        }

        $areas = $areas
        ->with('user:id,name')
        ->paginate(config('app.paginate'));

        $dataView = compact('breadcrumbs', 'request', 'areas','resume');
        return view('modules/cadastro/area/index', $dataView);
    }

    public function destroy($id)
    {
        try {
            $area = $this->model::findOrFail($id);
            $area->delete();
            session()->flash('flash_message', 'A área foi apagada com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover a Área!');
        }
        return redirect('cadastros/areas');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $area = $this->model::findOrNew($id);
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

        $dataView = compact('breadcrumbs', 'area','users','fazendas');
        return view('modules/cadastro/area/create', $dataView);
    }
    private function indexPdf($areas)
    {
        $areas = $areas->get();
        return \PDF::loadView('modules/cadastro/area/indexPdf', compact('areas'))
            ->setPaper('a4')
            ->download('Areas.pdf')
        ;
    }

    private function indexExcel($areas)
    {
        $areas = $areas->get();
        $view = 'modules/cadastro/area/indexExcel';
        $arquivo = 'Areas.xlsx';
        $dados = ['areas' => $areas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}