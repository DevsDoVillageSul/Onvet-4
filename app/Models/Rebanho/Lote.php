<?php

namespace App\Models\Rebanho;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Http\Traits\HasUserAccess; // importando a trait
use App\Models\User;

class Lote extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, HasUserAccess; // utilizando a trait;
    protected $table = "lotes";

    protected $sexos = [
        'MACHO' => 'Macho',
        'FEMEA' => 'Fêmea',
        'MISTO' => 'MISTO',
    ];

    protected $fases = [
        'CRIA' => 'Cria',
        'RECRIA' => 'Recria',
        'PRODUCAO' => 'Produção',
    ];
    protected $fillable = [
        'user_id',
    ];
    
    public function scopeActive($query)
    {
        return $query->where('ativo', 1);
    }

    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%");
            });
        }

        if (isset($request->ativo) && $request->ativo != "") {
            $query->where(function ($q) use ($request) {
                $q->where('ativo', $request->ativo);
            });
        }
        
        return $query;
    }

    public function getSexo()
    {
        return $this->sexos[$this->sexo];
    }

    public function getSexos()
    {
        return $this->sexos;
    }

    public function getFase()
    {
        return $this->fases[$this->fase];
    }

    public function getFases()
    {
        return $this->fases;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
