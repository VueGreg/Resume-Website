<?php

namespace App\Models;

use App\Models\skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project extends Model
{
    use HasFactory;

    public function skills()
    {
        return $this->belongsToMany(skill::class, 'skill_projects', 'id_project', 'id_skill');
    }

    public function experience()
    {
        return $this->belongsTo(experience::class, 'id_experience');
    }

    public function technologies()
    {
        return $this->belongsToMany(technology::class, 'technology_projects', 'id_project', 'id_technology');
    }

    public function types() 
    {
        return $this->belongsTo(TypeModel::class, 'id_type_models');
    }
}
