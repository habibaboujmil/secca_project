<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Material;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        $search =$request->input('search');
        $brands = Brand::withCount('materials')
                    ->when(!empty($search),function ($q) use($search){
                        $q->where('name','like', '%'.$search.'%');
                    })
                    ->get();
        return view('pages.brands.brands',compact('brands'));
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

    public function materialsList(Request $request, $id)
    {
        $brand = Brand::find($id);
        $search =$request->input('search');
        $brand->materials = Material::where('brand_id',$brand->id)
                            ->when(!empty($search),function ($q) use($search){
                                $q->where('reference', 'like', '%'.$search.'%');
                            })->orderBy('id','desc')->paginate(40);
                            // return response()->json($brand);
        return view('pages.brands.brand_details',compact('brand'));
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!empty($brand->logo)) {
            Storage::disk('public')->delete('brand'.$brand->logo);
        }
        $brand->delete();
        return back();
    }

    public function edite(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->input('brand_name');
        $brand->save();
        return back();
    }


}
