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
        $affairs = Affair::orderBy('id','DESC')->paginate(15); 
        return view('pages.affairs.list', compact('affairs'));
    }
    
    public function details($id)
    {
        $affair = Affair::with('materials')->find($id); 
        $affair->materials = AffairEquipment::where('affair_id',$id)->orderBy('id','desc')->paginate(40);
         return view('pages.affairs.details', compact('affair'));
        // return response()->json($affair);
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
    public function delete($id)
    {
        $affair = Affair::find($id);
        $affair->delete();
        return back();
    }
}
