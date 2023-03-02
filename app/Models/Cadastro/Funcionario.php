<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;
use App\Models\Cadastro\Fazenda;
class Funcionario extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'user_id',
    ];
    protected $table = "funcionario";
    protected $sexos = [
        'M' => 'Masculino',
        'F' => 'Feminino',
        'O' => 'Outros',
    ];

    public function contatos()
    {
        return $this->hasMany(FuncionarioContato::class, 'funcionario_id');
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

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function fazenda()
    {
        return $this->belongsTo(Fazenda::class, 'fazenda_id');
    }
    public function getSexo()
    {
        return $this->sexos[$this->sexo];
    }

    public function getSexos()
    {
        return $this->sexos;
    }
}