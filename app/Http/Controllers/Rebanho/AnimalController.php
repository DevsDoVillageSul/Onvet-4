<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use App\Models\Cadastro\Fazenda;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AnimalController extends Controller
{
    protected $model = Animal::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Animais"],
        ['link' => "/rebanho/animais", 'name' => "Animais"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $animais = Animal::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
            ->orderBy('fazenda_id')
        ;
        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $animais = Animal::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $animais = Animal::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }
        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($animais);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($animais);
        }

        $animais = $animais
            ->with('lote:id,nome')
            ->with('fornecedor:id,nome')
            ->with('user:id,name')
            ->paginate(config('app.paginate'));


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


        $dataView = compact('breadcrumbs', 'request', 'animais', 'resume');
        return view('modules/rebanho/animal/index', $dataView);
    }

    private function indexPdf($animais)
    {
        $animais = $animais->get();
        return \PDF::loadView('modules/rebanho/animal/indexPdf', compact('animais'))
            ->setPaper('a4')
            ->download('Animais.pdf')
        ;
    }

    private function indexExcel($animais)
    {
        $animais = $animais->get();
        $view = 'modules/rebanho/animal/indexExcel';
        $arquivo = 'Animais.xlsx';
        $dados = ['animais' => $animais];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if (Auth::user()->role_id == 1) {
            // Se o usuário tem a role 1, mostre todas as fazendas
            $fazendas = Fazenda::all();
            $lotes = Lote::all();
            $fornecedores = Fornecedor::all();
            $users = User::all();
        } else {
            // Se não, mostre apenas as fazendas, lotes e fornecedores do usuário logado
            $user_id = Auth::id();
            $fazendas = Fazenda::where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhereNull('user_id');
            })->get();
            $lotes = Lote::where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhereNull('user_id');
            })->get();
            $fornecedores = Fornecedor::where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhereNull('user_id');
            })->get();
            $users = User::where(function ($query) use ($user_id) {
                $query->where('id', $user_id);
            })->get();
        }

        $animal = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'animal', 'lotes', 'fornecedores', 'users', 'fazendas');
        return view('modules/rebanho/animal/create', $dataView);
    }
    public function destroy($id)
    {
        try {
            $animal = $this->model::findOrFail($id);
            $animal->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/animais');
    }

    public function show($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $animal = $this->model::findOrFail($id);
        $viewData = compact('breadcrumbs', 'animal');
        return view('modules/rebanho/animais/show', $viewData);
    }
}