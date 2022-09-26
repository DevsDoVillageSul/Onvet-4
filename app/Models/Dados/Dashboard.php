<?php

namespace App\Models\Dados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Dashboard extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    
}
