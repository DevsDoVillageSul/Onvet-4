<?php

namespace App\Models\Protocolo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Rebanho\Animal;
use App\Models\User;
use App\Http\Traits\HasUserAccess; // importando a trait

class Iatf extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, HasUserAccess; // utilizando a trait;

    protected $table = 'iatfs';
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}