<?php

namespace App\Http\Controllers\Informacao;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Dados\Dashboard;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use App\Models\Cadastro\Cultura;
use App\Models\Cadastro\Tanque;
use App\Models\Cadastro\Area;
use App\Models\Cadastro\Pastagem;
use App\Models\Cadastro\Funcionario;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    protected $model = Animal::class;
    protected $breadcrumbs = [
        ['name' => "Dashboard"],
        ['link' => "/informacao/dashboard", 'name' => "Dashboard"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;

        $resume_animal = Animal::filtros($request)
        ->select(
            DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
            DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 1)
        ->first()
       ;

       $resume_cultura = Cultura::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_tanque = Tanque::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_fornecedor = Fornecedor::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_area = Area::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_lote = Lote::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_pastagem = Pastagem::filtros($request)
      ->select(
        DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
        DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
      ->where('id', '>', 1)
      ->first()
      ;

      $resume_user = User::filtros($request)
      ->select(
          DB::raw('SUM(IF(active = 1, 1 ,0)) as actives'),
          DB::raw('SUM(IF(active = 0, 1 ,0)) as inactives')
      )
      ->where('id', '>', 1)
      ->first()
     ;

     $resume_funcionario = Funcionario::filtros($request)
    ->select(
      DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
      DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
      )
    ->where('id', '>', 1)
    ->first()
     ;

     $data = DB::table('animais')
       ->select(
        DB::raw('raca as raca'),
        DB::raw('count(*) as number'))
       ->groupBy('raca')
       ->get();
     $array[] = ['Raca', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->raca, $value->number];
     }


        $dataView = compact('breadcrumbs', 'request', 'resume_animal', 'resume_cultura','resume_tanque',
        'resume_fornecedor', 'resume_area','resume_lote','resume_pastagem','resume_user','resume_funcionario','data');
        return view('modules/informacao/dashboard/index', $dataView)->with('raca', json_encode($array));
    }

    // public function consultaAnimais()
    // {
    //     try {

    //         $animais = Animal::selectRaw('raca, COUNT(id) as totalRaca')
    //         ->groupByRaw('raca')
    //         ->get();

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

    // public function consultaAnimaisPeso()
    // {
    //     try {

    //         $peso = Animal::select('peso')
    //         ->where('peso', '>', '0')
    //         ->get();
            
    //         $soma = Animal::select('peso')
    //         ->where('peso', '>', '0')
    //         ->get()
    //         ->sum('peso');
                           
    //         return response()->json($peso, 200);

    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

} 