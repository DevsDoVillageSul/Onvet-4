<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Fornecedor;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FornecedorController extends Controller
{
    protected $model = Fornecedor::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/fornecedores", 'name' => "Fornecedores"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $fornecedores = Fornecedor::filtros($request)
            ->withCount([
                'contatos as contato' => function ($query) {
                    $query->where('nome', "Ale");
                }
            ])
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado 
            ->orderBy('nome', 'ASC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $fornecedores = Fornecedor::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $fornecedores = Fornecedor::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($fornecedores);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($fornecedores);
        }

        $fornecedores = $fornecedores
        ->with('user:id,name')
        ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'fornecedores');
        return view('modules/cadastro/fornecedor/index', $dataView);

    }
    private function indexPdf($fornecedores)
    {
        $fornecedores = $fornecedores->get();
        return \PDF::loadView('modules/cadastro/fornecedor/indexPdf', compact('fornecedores'))
            ->setPaper('a4')
            ->download('Fornecedores.pdf')
        ;
    }

    private function indexExcel($fornecedores)
    {
        $fornecedores = $fornecedores->get();
        $view = 'modules/cadastro/fornecedor/indexExcel';
        $arquivo = 'Fornecedores.xlsx';
        $dados = ['fornecedores' => $fornecedores];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $fornecedor = $this->model::findOrFail($id);
            $fornecedor->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/fornecedores');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $fornecedor = $this->model::findOrNew($id);
        $users = User::select('id', 'name')->orderBy('name')->get();
        $dataView = compact('breadcrumbs', 'fornecedor','users');
        return view('modules/cadastro/fornecedor/create', $dataView);

    }
}