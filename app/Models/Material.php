<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Affair;
use App\Models\Brand;


class Material extends Model
{
    protected $fillable =['reference','designation','quantity','brand_id'];
    use HasFactory;

    public function Affairs()
    {
        return $this->belongsToMany(Affair::class, 'affair_material','material_id','affair_id')->withTimestamps();
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
