<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plage;
use App\Models\Commune;

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
            ->join('communes', 'plages.zip', '=', 'communes.zip')
            ->latest()->paginate($perPage);
        }else{
            $plages = Plage::select('plages.*', 'communes.name as commune_name')
            ->join('communes', 'plages.zip', '=', 'communes.zip')
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

        $plage = new Plage;
        $plage->name = $request->name;
        $plage->zip = $request->zip;
        $plage->description = $request->description;

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été ajouté');
        
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

        $plage = Plage::find($request->hidden_id);
        $plage->name = $request->name;
        $plage->zip = $request->zip;
        $plage->description = $request->description;

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été modifié');

    }

    public function destroy($id){

        $plage = Plage::findOrFail($id);

        $plage->delete();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été supprimé');

    }
}
