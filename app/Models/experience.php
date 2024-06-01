<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;

    public function projects() 
    {
        return $this->hasMany(project::class, 'id_experience');
    }

    public function business()
    {
        return $this->belongsTo(business::class, 'id_business');
    }
}
