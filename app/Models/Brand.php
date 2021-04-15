<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Brand extends Model
{
    use HasFactory;

    public function Materials()
    {
        return $this->hasMany(Material::class);
    }
}
