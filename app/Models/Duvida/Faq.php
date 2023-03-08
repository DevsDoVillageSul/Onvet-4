<?php

namespace App\Models\Duvida;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\User;
use App\Http\Traits\HasUserAccess; // importando a trait

class Faq extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable, HasUserAccess; // utilizando a trait;
    protected $table = "faqs";

    protected $fillable = [
        'user_id',
    ];
    
    public function scopeFiltros($query, $request)
    {
        if (isset($request->search) && $request->search != "") {
            $query->where(function ($q) use ($request) {
                $q->where('pergunta', 'like', "%{$request->search}%");
            });
        }
        
        return $query;
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeAtivo($query)
    {
        return $query->where('ativo', 1);
    }
}
