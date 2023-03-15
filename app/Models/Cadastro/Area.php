<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
use App\Http\Traits\HasUserAccess; // importando a trait

class Area extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, HasUserAccess; // utilizando a trait;


    protected $table = "areas";
    protected $tipos = [
        'ARRENDADA' => 'Área arrendada',
        'CONFINAMENTO' => 'Área confinamento',
        'OUTRAS' => 'Outras áreas para a atividade',
        'RESERVA' => 'Reserva legal e APP',
    ];
    protected $fillable = [
        'user_id',
    ];

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

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

    public function getTipo()
    {
        return $this->tipos[$this->tipo];
    }

    public function getTipos()
    {
        return $this->tipos;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function fazenda()
    {
        return $this->belongsTo(Fazenda::class, 'fazenda_id');
    }
}
