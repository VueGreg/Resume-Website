<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    use HasFactory;

    public function experience()
    {
        return $this->hasOne(experience::class);
    }
}
