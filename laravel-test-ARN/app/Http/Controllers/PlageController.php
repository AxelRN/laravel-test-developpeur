<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plage;

class PlageController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $perPage = 5;

        if(!empty($search)){
            $plages = Plage::where('name', 'LIKE', "%$search%")
            ->orWhere('category', 'LIKE', "%$search%")
            ->latest()->paginate($perPage);
        }else{
            $plages = Plage::latest()->paginate($perPage);
        }

        return view('plages.list',['plages'=>$plages])->with('i',(request()->input('page',1) -1) *$perPage);
    }
}
