<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plage;
use App\Models\Commune;
use voku\helper\AntiXSS;

class PlageController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $perPage = 5;

        if(!empty($search)){
            $plages = Plage::select('plages.*', 'communes.name as commune_name')
            ->where('plages.name', 'LIKE', "%$search%")
            ->orWhere('plages.zip', 'LIKE', "%$search%")
            ->orWhere('communes.name', 'LIKE', "%$search%")
            ->orWhere('communes.zip', 'LIKE', "%$search%")
            ->join('communes', 'plages.zip', '=', 'communes.code_insee')
            ->latest()->paginate($perPage);
        }else{
            $plages = Plage::select('plages.*', 'communes.name as commune_name')
            ->join('communes', 'plages.zip', '=', 'communes.code_insee')
            ->paginate($perPage);
        }

        return view('plages.list',['plages'=>$plages])->with('i',(request()->input('page',1) -1) *$perPage);
    }

    public function create(){

        $communes = Commune::orderby('name')->get();

        return view('plages.add',['communes'=>$communes]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'zip' => 'required',
        ]);

        $antiXss = new AntiXSS();

        $plage = new Plage;
        $plage->name = $antiXss->xss_clean($request->name);
        $plage->zip = $antiXss->xss_clean($request->zip);
        $plage->description = ''.$antiXss->xss_clean($request->description);

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été ajoutée');

    }

    public function edit($id){

        $plage = Plage::findOrFail($id);
        $communes = Commune::orderby('name')->get();

        return view('plages.edit',['plage'=>$plage,'communes'=>$communes]);

    }

    public function update(Request $request, Plage $plage){

        $request->validate([
            'name' => 'required',
            'zip' => 'required',
        ]);

        $antiXss = new AntiXSS();

        $plage = Plage::find($request->hidden_id);
        $plage->name = $antiXss->xss_clean($request->name);
        $plage->zip = $antiXss->xss_clean($request->zip);
        $plage->description = ''.$antiXss->xss_clean($request->description);

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été modifiée');

    }

    public function destroy($id){

        $plage = Plage::findOrFail($id);

        $plage->delete();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été supprimée');

    }
}
