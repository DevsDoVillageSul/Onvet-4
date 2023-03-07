<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Tanque;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;

class TanqueController extends Controller
{
    protected $model = Tanque::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/tanques", 'name' => "Tanques"]
    ];

    public function index(Request $request)
    {

        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $tanques = Tanque::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado    
            ->orderBy('id', 'DESC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $tanques = Tanque::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $tanques = Tanque::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }


        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($tanques);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($tanques);
        }

        $tanques = $tanques
        ->with('user:id,name')
        ->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'tanques');
        return view('modules/cadastro/tanque/index', $dataView);
    }

    public function destroy($id)
    {
        try {
            $tanque = $this->model::findOrFail($id);
            $tanque->delete();
            session()->flash('flash_message', 'O tanque foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o tanque!');
        }
        return redirect('cadastros/tanques');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $tanque = $this->model::findOrNew($id);
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
       
        $dataView = compact('breadcrumbs', 'tanque','users','fazendas');
        return view('modules/cadastro/tanque/create', $dataView);
    }

    private function indexPdf($tanques)
    {
        $tanques = $tanques->get();
        return \PDF::loadView('modules/cadastro/tanque/indexPdf', compact('tanques'))
            ->setPaper('a4')
            ->download('Tanques.pdf')
        ;
    }

    private function indexExcel($tanques)
    {
        $tanques = $tanques->get();
        $view = 'modules/cadastro/tanque/indexExcel';
        $arquivo = 'Tanques.xlsx';
        $dados = ['tanques' => $tanques];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}