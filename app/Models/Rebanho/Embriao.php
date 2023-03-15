<?php

namespace App\Models\Rebanho;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Rebanho\Animal;
use App\Http\Traits\HasUserAccess; // importando a trait
use App\Models\User;

class Embriao extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, HasUserAccess; // utilizando a trait;    protected $table = "semens";
    protected $table = "embrioes";

    protected $tipos = [
        'VITRO' => 'In Vitro',
        'VIVO' => 'In Vivo',
    ];

    protected $fillable = [
        'user_id',
    ];

    protected $congelamentos = [
        'VITRIFICACAO' => 'Vitrificação',
        'TD' => 'TD',
    ];

    protected $graus = [
        'MO' => 'MO',
        'BL' => 'BL',
        'BX' => 'BX',
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
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function animais()
    {
        return $this->belongsTo(Animal::class, 'animais_id');
    }

    public function getTipo()
    {
        return $this->tipos[$this->tipo];
    }

    public function getTipos()
    {
        return $this->tipos;
    }

    public function getCongelamento()
    {
        return $this->congelamentos[$this->congelamento];
    }

    public function getCongelamentos()
    {
        return $this->congelamentos;
    }

    public function getGrau()
    {
        return $this->graus[$this->grau];
    }

    public function getGraus()
    {
        return $this->graus;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
