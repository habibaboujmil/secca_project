<?php

namespace App\Http\Controllers;
use App\Models\Affair;
use App\Models\Material;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $lastAffair = Affair::orderBy('id','DESC')->take(5)->get();
        $affairNumber = Affair::count();
        $users = User::count();
        $materialNumber = Material::count();
        $materialQuery = Material::where('quantity',0);
        $outOfStockNum =  $materialQuery->count();
        $outOfStock =  $materialQuery->with('brand')->paginate(10);
        // dd($outOfStock);
        return view('dashboard',compact('materialNumber','users','lastAffair','affairNumber','outOfStock','outOfStockNum'));
    }
}
