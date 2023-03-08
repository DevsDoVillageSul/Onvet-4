<?php

namespace App\Http\Controllers\Duvida;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Duvida\Faq;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    protected $model = Faq::class;
    protected $breadcrumbs = [
        ['name' => "Dúvidas Gerais"],
        ['link' => "/duvida/faqs", 'name' => "FAQs"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $user_id = Auth::id(); // Obter o ID do usuário autenticado
        $faqs = Faq::filtros($request)
            ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado 
            ->orderBy('pergunta', 'ASC')
        ;

        // permite que o usuário com role_id = 1 veja todos os dados
        if (auth()->user()->role_id == 1) {
            $faqs = Faq::filtros($request)
                ->orderBy('nome', 'ASC');
        } else {
            $faqs = Faq::filtros($request)
                ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
                ->orderBy('nome', 'ASC');
        }

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($faqs);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($faqs);
        }

        $faqs = $faqs
        ->with('user:id,name')
        ->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'faqs');
        return view('modules/duvida/faq/index', $dataView);
    }

    private function indexPdf($faqs)
    {
        $faqs = $faqs->get();
        return \PDF::loadView('modules/duvida/faq/indexPdf', compact('faqs'))
            ->setPaper('a4')
            ->download('FAQs.pdf')
        ;
    }

    private function indexExcel($faqs)
    {
        $faqs = $faqs->get();
        $view = 'modules/duvida/faq/indexExcel';
        $arquivo = 'FAQs.xlsx';
        $dados = ['faqs' => $faqs];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $faq = $this->model::findOrNew($id);
        $users = User::select('id', 'name')->orderBy('name')->get();
        $dataView = compact('breadcrumbs', 'faq','users');
        return view('modules/duvida/faq/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $faq = $this->model::findOrFail($id);
            $faq->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('duvida/faqs');
    }
}