<?php

namespace App\Models;

use App\Models\project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class skill extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(project::class, 'skill_projects', 'id_skill', 'id_project');
    }
}
