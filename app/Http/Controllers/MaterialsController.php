<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialsController extends Controller
{
    public function create(Request $request){

        $material = new Material();
        $material->reference = $request->input('reference');
        $material->designation = $request->input('designation');
        $material->quantity = $request->input('quantity');
        $material->note = $request->input('note');
        $material->img = $request->input('img');
        $material->brand_id = $request->input('brand_id');
        $material->save();
        return back();
    }
    public function delete($id)
    {
        $material = Material::find($id);
        Storage::disk('public')->delete('brand'.$material->img);
        $brand->delete();
        return back();
    }
}
