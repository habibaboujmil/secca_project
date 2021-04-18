<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Material;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('materials')->get();
        return view('pages.brands',compact('brands'));
    }
    public function create(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('brand_name');
        if ($request->hasFile('brand_logo')) {
            $brand->logo = $request->file('brand_logo')->storePublicly('brands','public');
        }
        $brand->save();
        return back();
    }

    public function materialsList($id)
    {
        $brand = Brand::find($id);
        $brand->materials = Material::where('brand_id',$brand->id)->orderBy('id','desc')->paginate(25);
        // return response()->json($brand);
        return view('pages.brand_details',compact('brand'));
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        Storage::disk('public')->delete('brand'.$brand->logo);
        $brand->delete();
        return back();
    }


}
