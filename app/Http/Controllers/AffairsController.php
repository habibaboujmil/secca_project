<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\AffairEquipment;
use App\Models\Affair;
use App\Imports\AffairImport;
use Maatwebsite\Excel\Facades\Excel; 

class AffairsController extends Controller
{
    public function index(Request $request){
        $search =$request->input('search');
        $affairs = Affair::when(!empty($search),function ($q) use($search){
                        $q->where('reference', 'like', '%'.$search.'%');
                    })-> orderBy('id','DESC')->paginate(30); 
        return view('pages.affairs.list', compact('affairs'));
    }
    
    public function details(Request $request,$id)
    {
        $affair = Affair::find($id);
        $search =$request->input('search'); 
        $affair->materials = AffairEquipment::where('affair_id',$id)
                            ->when(!empty($search),function ($q) use($search){
                                $q->where('reference', 'like', '%'.$search.'%');
                                // ->orWhere('description', 'like', '%'.$search.'%');
                            })
                            ->orderBy('id','desc')->paginate(40);
         return view('pages.affairs.details', compact('affair'));
    }

    public function createViaExcel(Request $request){

        $affair = new Affair();
        $affair->reference = $request->input('ref');
        $affair->description = $request->input('description');
        $affair->save();
        $MaterialImport =new AffairImport();
        $MaterialImport->affair_id = $affair->id;
        Excel::import($MaterialImport,request()->file('file'));
        return back();
    }

    public function createOneByOne(Request $request){
        $affair = new Affair();
        $affair->reference = $request->input('ref');
        $affair->description = $request->input('description');
        $affair->save();
        $equipment_num = count($request->input('reference'));
        $index = 0;
        while ($index < $equipment_num ) {
            $material = new AffairEquipment();
            $material->reference = $request->input('reference')[$index];
            $material->designation = $request->input('designation')[$index];
            $material->quantity = $request->input('quantity')[$index];
            $material->unit_price = $request->input('unit_price')[$index];
            $material->note = $request->input('note')[$index];
            $material->affair_id = $affair->id;
            $material->save();
            $index ++;
        }
        return back();
    }
    public function delete($id)
    {
        $affair = Affair::find($id);
        $affair->delete();
        return back();
    }

    public function createEquipment(Request $request){
        $material = new AffairEquipment();
        $material->reference = $request->input('reference');
        $material->designation = $request->input('designation');
        $material->quantity = $request->input('quantity');
        $material->unit_price = $request->input('unit_price');
        $material->note = $request->input('note');
        $material->affair_id = $request->input('affair_id');
        $material->save();
        return back();
    }

    public function editeEquipment(Request $request, $id){
        $material = AffairEquipment::find($id);
        $material->reference = $request->input('reference');
        $material->designation = $request->input('designation');
        $material->quantity = $request->input('quantity');
        $material->note = $request->input('note');
        $material->unit_price = $request->input('unit_price');
        $material->save();
        return back();
    }
    public function deleteEquipment($id){
        $material = AffairEquipment::find($id);
        $material->delete();
        return back();
    }
}
