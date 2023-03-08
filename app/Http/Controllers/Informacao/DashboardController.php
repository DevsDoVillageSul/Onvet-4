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
use Illuminate\Support\Facades\Auth;

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
    $user_id = Auth::id(); // Obter o ID do usuário autenticado

    if (auth()->user()->role_id == 1) {
      $resume_animal = Animal::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first();

      $resume_cultura = Cultura::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first()
      ;

      $resume_tanque = Tanque::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first()
      ;

      $resume_fornecedor = Fornecedor::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first()
      ;

      $resume_area = Area::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first()
      ;

      $resume_lote = Lote::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->first()
      ;

      $resume_pastagem = Pastagem::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
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
        ->where('id', '>', 0)
        ->first()
      ;

      //  função para o gráfico de animais
      $data = DB::table('animais')
        ->select(
          DB::raw('raca as raca'),
          DB::raw('count(*) as number')
        )
        ->groupBy('raca')
        ->get();
      $array[] = ['Raca', 'Number'];
      foreach ($data as $key => $value) {
        $array[++$key] = [$value->raca, $value->number];
      }

      //  função para o gráfico de pastagens
      $data_pastagens = DB::table('pastagem')
        ->select(
          DB::raw('tipo as tipo'),
          DB::raw('count(*) as number')
        )
        ->groupBy('tipo')
        ->get();
      $array_pastagens[] = ['Tipo', 'Number'];
      foreach ($data_pastagens as $key => $value) {
        $array_pastagens[++$key] = [$value->tipo, $value->number];
      }

      //  função para o gráfico de embriões
      $data_embrioes = DB::table('embrioes')
        ->select(
          DB::raw('grau as grau'),
          DB::raw('count(*) as number')
        )
        ->groupBy('grau')
        ->get();
      $array_embrioes[] = ['Grau', 'Number'];
      foreach ($data_embrioes as $key => $value) {
        $array_embrioes[++$key] = [$value->grau, $value->number];
      }

      //  função para o gráfico de lotes
      $data_lotes = DB::table('lotes')
        ->select(
          DB::raw('fase as fase'),
          DB::raw('count(*) as number')
        )
        ->groupBy('fase')
        ->get();
      $array_lotes[] = ['Fase', 'Number'];
      foreach ($data_lotes as $key => $value) {
        $array_lotes[++$key] = [$value->fase, $value->number];
      }




    } else {
      $resume_animal = Animal::filtros($request)

        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first();

      $resume_cultura = Cultura::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;

      $resume_tanque = Tanque::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;
      $resume_fornecedor = Fornecedor::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;

      $resume_area = Area::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;


      $resume_lote = Lote::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;

      $resume_pastagem = Pastagem::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;


      $resume_user = User::filtros($request)
        ->select(
          DB::raw('SUM(IF(active = 1, 1 ,0)) as actives'),
          DB::raw('SUM(IF(active = 0, 1 ,0)) as inactives')
        )
        ->where('id', '>', 1)
        ->where('id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;


      $resume_funcionario = Funcionario::filtros($request)
        ->select(
          DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
          DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 0)
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->first()
      ;

      //  função para o gráfico de animais
      $data = DB::table('animais')
        ->select(
          DB::raw('raca as raca'),
          DB::raw('count(*) as number')
        )

        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->groupBy('raca')
        ->get();
      $array[] = ['Raca', 'Number'];
      foreach ($data as $key => $value) {
        $array[++$key] = [$value->raca, $value->number];
      }
      //  função para o gráfico de pastagens
      $data_pastagens = DB::table('pastagem')
        ->select(
          DB::raw('tipo as tipo'),
          DB::raw('count(*) as number')
        )
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->groupBy('tipo')
        ->get();
      $array_pastagens[] = ['Tipo', 'Number'];
      foreach ($data_pastagens as $key => $value) {
        $array_pastagens[++$key] = [$value->tipo, $value->number];
      }

      //  função para o gráfico de embriões
      $data_embrioes = DB::table('embrioes')
        ->select(
          DB::raw('grau as grau'),
          DB::raw('count(*) as number')
        )
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->groupBy('grau')
        ->get();
      $array_embrioes[] = ['Grau', 'Number'];
      foreach ($data_embrioes as $key => $value) {
        $array_embrioes[++$key] = [$value->grau, $value->number];
      }

      //  função para o gráfico de lotes
      $data_lotes = DB::table('lotes')
        ->select(
          DB::raw('fase as fase'),
          DB::raw('count(*) as number')
        )
        ->where('user_id', $user_id) // Filtar fazendas pelo ID do usuário autenticado
        ->groupBy('fase')
        ->get();
      $array_lotes[] = ['Fase', 'Number'];
      foreach ($data_lotes as $key => $value) {
        $array_lotes[++$key] = [$value->fase, $value->number];
      }

    }

    $dataView = compact(
      'breadcrumbs',
      'request',
      'resume_animal',
      'resume_cultura',
      'resume_tanque',
      'resume_fornecedor',
      'resume_area',
      'resume_lote',
      'resume_pastagem',
      'resume_user',
      'resume_funcionario',
      'data',
      'data_pastagens',
      'data_embrioes',
      'data_lotes'
    );
    return view('modules/informacao/dashboard/index', $dataView)->with('raca', json_encode($array))
      ->with('tipo', json_encode($array_pastagens))->with('grau', json_encode($array_embrioes))
      ->with('fase', json_encode($array_lotes));
  }


}