<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Affair extends Model
{
    use HasFactory;

    // public function Materials()
    // {
    //     return $this->belongsToMany(Material::class, 'affair_material','material_id','affair_id')->withTimestamps();
    // }
    public function materials()
    {
        return $this->hasMany(AffairEquipment::class);
    }
}
