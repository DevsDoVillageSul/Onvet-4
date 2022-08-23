<?php

namespace App\Models\Rebanho;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Semen extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $table = "semens";

    protected $casts = [
        "tipos" => "array"
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
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }
        
        return $query;
    }

    public function getRaca()
    {
        return $this->racas[$this->raca];
    }

    public function getRacas()
    {
        return $this->racas;
    }

}
