<?php

namespace App\Http\Controllers\Protocolo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Protocolo\Te;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rebanho\Animal;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use Illuminate\Support\Facades\Auth;

class TeController extends Controller
{
    protected $model = Te::class;

    protected $breadcrumbs = [
        ['name' => "Protocolos"],
        ['link' => "/protocolos/tes", 'name' => "Cadastrar protocolo TE"]
    ];

    public function index(Request $request)
    {

        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $tes = Te::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado         
            ->orderBy('id', 'DESC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $tes = Te::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $tes = Te::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($tes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($tes);
        }

        $tes = $tes
        ->with('user:id,name')
        ->with('animal:id,nome', 'animais:id,nome')
        ->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'tes');
        return view('modules/protocolo/te/index', $dataView);
    }

    private function indexPdf($tes)
    {
        $tes = $tes->get();
        return \PDF::loadView('modules/protocolo/te/indexPdf', compact('tes'))
            ->setPaper('a4')
            ->download('Tes.pdf')
        ;
    }

    private function indexExcel($tes)
    {
        $tes = $tes->get();
        $view = 'modules/protocolo/te/indexExcel';
        $arquivo = 'tes.xlsx';
        $dados = ['tes' => $tes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $te = $this->model::findOrFail($id);
            $te->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('protocolos/tes');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $te = $this->model::findOrNew($id);
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

        $dataView = compact('breadcrumbs', 'te', 'animais', 'animais2', 'users');
        return view('modules/protocolo/te/create', $dataView);
    }
}