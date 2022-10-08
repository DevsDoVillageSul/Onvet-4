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

    public function __construct(private Animal $animal)
    {
        
    }

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
        try {

            $animais = Animal::selectRaw('raca, COUNT(id) as totalRaca')
            ->groupByRaw('raca')
            ->get();

            return response()->json($animais , 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // public function consultaAnimais()
    // {
    //     try {

    //         $animais = Animal::select('raca')
    //         ->groupBy('raca')
    //         ->get();
    //                              //select COUNT(id), raca from animais GROUP BY raca; 

    //         return response()->json($animais , 200);

    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function consultaAnimaisRaca($raca)
    // {
    //     try {

    //         $animais = Animal::all()
    //                         ->where('raca', $raca)
    //                         ->count();
                           
    //         return response()->json($animais , 200);

    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function consultaAnimaisPeso()
    {
        try {

            $peso = Animal::select('peso')
            ->where('peso', '>', '0')
            ->get();
            
            // $soma = Animal::select('peso')
            // ->where('peso', '>', '0')
            // ->get()
            // ->sum('peso');
                           
            return response()->json($peso, 200);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

} 