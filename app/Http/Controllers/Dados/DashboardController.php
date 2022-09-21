<?php

namespace App\Http\Controllers\Dados;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use App\Models\Dados\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    protected $model = Dashboard::class;
    protected $breadcrumbs = [
        ['name' => "Dashboard"],
        ['link' => "/dados/dashboard", 'name' => "Dashboard"]
    ];

    public function buscarAnimais(){

        $animais = Animal::filtros($request)
            ->orderBy('nome', 'ASC');
        

        $animais = $animais
        ->with('lote:id,nome')
        ->with('fornecedor:id,nome');
        
        dd($animais);
        //return response()->json($animais); 
    }


    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;

       /*$resume = $this->model::filtros($request)
            ->select(
                DB::raw('SUM(IF(active = 1, 1 ,0)) as actives'),
                DB::raw('SUM(IF(active = 0, 1 ,0)) as inactives')
            )
            ->where('id', '>', 1)
            ->first()
        ;
        */

        $dataView = compact('breadcrumbs');

        return view('modules/dados/dashboard/index', $dataView); 
    }


}
