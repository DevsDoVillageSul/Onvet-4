<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasUserAccess
{
    public function scopeUserAccess(Builder $query)
    {
        $user = auth()->user();

        if ($user->isAdmin() || $user->role_id == 1) {
            return $query;
        }

        return $query->where('user_id', $user->id);
    }
}