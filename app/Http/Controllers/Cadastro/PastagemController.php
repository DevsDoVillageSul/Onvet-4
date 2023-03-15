<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Pastagem;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PastagemController extends Controller
{ 
    protected $model = Pastagem::class;
    
    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/pastagens", 'name' => "Pastagens"]
    ];
        
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
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
        $pastagens = Pastagem::filtros($request)        
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado    
        ->orderBy('id', 'DESC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $pastagens = Pastagem::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $pastagens = Pastagem::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($pastagens);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($pastagens);
        }

        $pastagens = $pastagens
        ->with('user:id,name')
        ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'pastagens','resume');
        return view('modules/cadastro/pastagem/index', $dataView);       

    }
    private function indexPdf($pastagens)
    {
        $pastagens = $pastagens->get();
        return \PDF::loadView('modules/cadastro/pastagem/indexPdf', compact('pastagens'))
            ->setPaper('a4')
            ->download('Pastagens.pdf')
        ;
    }

    private function indexExcel($pastagens)
    {
        $pastagens = $pastagens->get();
        $view = 'modules/cadastro/pastagem/indexExcel';
        $arquivo = 'Pastagens.xlsx';
        $dados = ['pastagens' => $pastagens];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $pastagem = $this->model::findOrFail($id);
            $pastagem->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/pastagens');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $pastagem = $this->model::findOrNew($id);
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

        $dataView = compact('breadcrumbs', 'pastagem','users','fazendas');
        return view('modules/cadastro/pastagem/create', $dataView);
    
    }
}
