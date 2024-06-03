<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    use HasFactory;

    public function projects() 
    {
        return $this->hasMany(project::class, 'id_type_models');
    }
}
