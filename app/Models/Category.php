<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function technologies()
    {
        return $this->hasMany(Technology::class, 'id_category');
    }
}
