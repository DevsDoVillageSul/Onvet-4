<?php

namespace App\Http\Controllers\Dados;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Dados\Dashboard;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    protected $model = Animal::class;
    protected $breadcrumbs = [
        ['name' => "Dashboard"],
        ['link' => "/dados/dashboard", 'name' => "Dashboard"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;

        $dataView = compact('breadcrumbs');
        return view('modules/dados/dashboard/index', $dataView);
    }

    public function consultaAnimais()
    {
        
        $animais = Animal::all()->count();
        
        return response()->json($animais);
    }

} 