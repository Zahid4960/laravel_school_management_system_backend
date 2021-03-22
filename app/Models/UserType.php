<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types';

    protected $fillable = [
        'user_type'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
