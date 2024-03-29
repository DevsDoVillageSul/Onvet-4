<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Semen;
use App\Models\Rebanho\Animal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SemenController extends Controller
{
    protected $model = Semen::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Sêmens"],
        ['link' => "/rebanho/semens", 'name' => "Semens"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $semens = Semen::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado        
            ->orderBy('nome', 'ASC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $semens = Semen::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $semens = Semen::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($semens);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($semens);
        }

        $semens = $semens
            ->with('user:id,name')
            ->with('animal:id,nome', 'animais:id,nome')
            ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'semens');
        return view('modules/rebanho/semen/index', $dataView);
    }

    private function indexPdf($semens)
    {
        $semens = $semens->get();
        return \PDF::loadView('modules/rebanho/semen/indexPdf', compact('semens'))
            ->setPaper('a4')
            ->download('Semens.pdf')
        ;
    }

    private function indexExcel($semens)
    {
        $semens = $semens->get();
        $view = 'modules/rebanho/semen/indexExcel';
        $arquivo = 'Semens.xlsx';
        $dados = ['semens' => $semens];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $users = User::select('id', 'name')->orderBy('name')->get();
        $semen = $this->model::findOrNew($id);

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
        $dataView = compact('breadcrumbs', 'semen', 'animais', 'animais2','users');
        return view('modules/rebanho/semen/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $semen = $this->model::findOrFail($id);
            $semen->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/semens');
    }
}