<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function edite(Request $request,$id){

        $material = Material::find($id);
        $material->reference = $request->input('reference');
        $material->designation = $request->input('designation');
        $material->quantity = $request->input('quantity');
        $material->note = $request->input('note');
        // $material->img = $request->input('img');
        // $material->brand_id = $request->input('brand_id');
        $material->save();
        return back();
    }

    public function delete($id)
    {
        $material = Material::find($id);
        // Storage::disk('public')->delete('brand'.$material->img);
        $material->delete();
        return back();
    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function addMaterialsWithExcel(Request $request) 
    {
        // dd(request()->file('file'));
        $brand_id =$request->input('brand_id');
        $MaterialImport =new MaterialImport();
        $MaterialImport->brand_id = $brand_id ;
        Excel::import($MaterialImport,request()->file('file'));
             
        return back();
    }
}
