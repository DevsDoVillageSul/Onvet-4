<?php

namespace App\Models\Rebanho;

use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Animal extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "animais";

    protected $sexos = [
        'MACHO' => 'Macho',
        'FEMEA' => 'Fêmea',
    ];

    protected $origens = [
        'NASCIMENTO' => 'Nascimento',
        'COMPRA' => 'Compra',
        'OUTROS' => 'Outros',
    ];

    protected $sangues = [
        '1/2' => '1/2',
        '1/4' => '1/4',
        '1/8' => '1/8',
        '3/4' => '3/4',
        '3/8' => '3/8',
        '5/8' => '5/8',
        '7/8' => '7/8',
        '7/16' =>'7/16',
        '11/16' => '11/16',
        '13/16' => '13/16',
        '15/16' => '15/16',
        '31/32' => '31/32',
        'PO' => 'PO',
        'PC' => 'PC',
        'PCOC' => 'PCOC',
        'PCOD' => 'PCOD',
        'LA' => 'LA',
        'CG' => 'CG',
    ];

    protected $racas = [
        'ANGUS' => 'Aberdeen Angus',
        'ANELORADO' => 'Anelorado',
        'BRAFORD' => 'Braford',
        'BRAHMAN' => 'Brahman',
        'BRANGUS' => 'Brangus',
        'CANCHIM' => 'Canchim',
        'CARACU' => 'Caracu',
        'COMPOSTO' =>'Composto',
        'CRUZADO' => 'Cruzado de corte',
        'GIR' => 'Gir',
        'GIR LEITEIRO' => 'Gir leiteiro',
        'GIROLANDO' => 'Girolando',
        'GUZERA' => 'Guzerá',
        'GUZOLANDO' => 'PC',
        'HOLANDES' => 'Holandês',
        'HOLANDES VERMELHO' => 'Holandês Vermelho',
        'JERSEY' => 'Jersey',
        'JERSOLANDA' => 'Jersolanda',
        'NELORE' => 'Nelore',
        'NORNMANDO' => 'Normando',
        'PARDO SUICO' => 'Pardo Suíço',
        'PARDO SUICO - LEITE' => 'Pardo Suíço - Leite',
        'SENEPOL' => 'Senepol',
        'SIMENTAL' => 'Simental',
        'SIMENTAL MOCHO' => 'Simental Mocho',
        'SINDI' => 'SINDI',
        'TABAPUÃ' => 'Tbapuã',
        'TRICROSS' => 'Tricross',
        'WEST FLEMISH RER' => 'West Flemish Rer',
        'OUTROS' => 'Outros Cruzamentos',
    ];

    protected $racas_2 = [
        'ANGUS' => 'Aberdeen Angus',
        'ANELORADO' => 'Anelorado',
        'BRAFORD' => 'Braford',
        'BRAHMAN' => 'Brahman',
        'BRANGUS' => 'Brangus',
        'CANCHIM' => 'Canchim',
        'CARACU' => 'Caracu',
        'COMPOSTO' =>'Composto',
        'CRUZADO' => 'Cruzado de corte',
        'GIR' => 'Gir',
        'GIR LEITEIRO' => 'Gir leiteiro',
        'GIROLANDO' => 'Girolando',
        'GUZERA' => 'Guzerá',
        'GUZOLANDO' => 'PC',
        'HOLANDES' => 'Holandês',
        'HOLANDES VERMELHO' => 'Holandês Vermelho',
        'JERSEY' => 'Jersey',
        'JERSOLANDA' => 'Jersolanda',
        'NELORE' => 'Nelore',
        'NORNMANDO' => 'Normando',
        'PARDO SUICO' => 'Pardo Suíço',
        'PARDO SUICO - LEITE' => 'Pardo Suíço - Leite',
        'SENEPOL' => 'Senepol',
        'SIMENTAL' => 'Simental',
        'SIMENTAL MOCHO' => 'Simental Mocho',
        'SINDI' => 'SINDI',
        'TABAPUÃ' => 'Tbapuã',
        'TRICROSS' => 'Tricross',
        'WEST FLEMISH RER' => 'West Flemish Rer',
        'OUTROS' => 'Outros Cruzamentos',
    ];
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }
        
        return $query;
    }
    
    //chaves estrangeiras 
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    //listas
    public function getSexo()
    {
        return $this->sexos[$this->sexo];
    }

    public function getSexos()
    {
        return $this->sexos;
    }

    public function getOrigem()
    {
        return $this->origens[$this->origem];
    }

    public function getOrigens()
    {
        return $this->origens;
    }

    public function getSangue()
    {
        return $this->sangues[$this->sangue];
    }

    public function getSangues()
    {
        return $this->sangues;
    }
    
    public function getRaca()
    {
        return $this->racas[$this->raca];
    }

    public function getRacas()
    {
        return $this->racas;
    }

    public function getRaca2()
    {
        return $this->racas_2[$this->raca_2];
    }

    public function getRacas2()
    {
        return $this->racas_2;
    }


    //ativo 
    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

}
