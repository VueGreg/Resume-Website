<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(project::class, 'technology_projects', 'id_technology', 'id_project');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
