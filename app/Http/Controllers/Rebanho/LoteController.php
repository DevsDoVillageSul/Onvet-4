<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Lote;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    protected $model = Lote::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Lotes"],
        ['link' => "/rebanho/lotes", 'name' => "Lotes"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $lotes = Lote::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado 
            ->orderBy('nome', 'ASC')
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
            $lotes = Lote::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $lotes = Lote::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($lotes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($lotes);
        }

        $lotes = $lotes
        ->with('user:id,name')
        ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'lotes','resume');
        return view('modules/rebanho/lote/index', $dataView);
    }

    private function indexPdf($lotes)
    {
        $lotes = $lotes->get();
        return \PDF::loadView('modules/rebanho/lote/indexPdf', compact('lotes'))
            ->setPaper('a4')
            ->download('Lotes.pdf')
        ;
    }

    private function indexExcel($lotes)
    {
        $lotes = $lotes->get();
        $view = 'modules/rebanho/lote/indexExcel';
        $arquivo = 'Lotes.xlsx';
        $dados = ['lotes' => $lotes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $lote = $this->model::findOrNew($id);
        $users = User::select('id', 'name')->orderBy('name')->get();
        $dataView = compact('breadcrumbs', 'lote','users');
        return view('modules/rebanho/lote/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $lote = $this->model::findOrFail($id);
            $lote->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/lotes');
    }
}