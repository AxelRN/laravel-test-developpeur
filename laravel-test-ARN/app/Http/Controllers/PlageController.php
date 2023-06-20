<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plage;
use App\Models\Commune;
use voku\helper\AntiXSS;
use App\Http\Requests\StorePlageRequest;

class PlageController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $perPage = 5;

        $plages = Plage::with('commune')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('zip', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate($perPage);

        return view('plages.list',['plages'=>$plages])->with('i',(request()->input('page',1) -1) *$perPage);
    }

    public function create(){

        $communes = Commune::orderby('name')->get();

        return view('plages.add',['communes'=>$communes]);
    }

    public function store(StorePlageRequest $request){

        $antiXss = new AntiXSS();

        $plage = new Plage;
        $plage->name = $antiXss->xss_clean($request->name);
        $plage->zip = $antiXss->xss_clean($request->zip);
        $plage->description = ''.$antiXss->xss_clean($request->description);

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été ajoutée');

    }

    public function edit(Plage $plage)
    {

        $communes = Commune::orderby('name')->get();

        return view('plages.edit',['plage'=>$plage,'communes'=>$communes]);

    }

    public function update(StorePlageRequest $request, Plage $plage)
    {

        $antiXss = new AntiXSS();

        $plage->name = $antiXss->xss_clean($request->name);
        $plage->zip = $antiXss->xss_clean($request->zip);
        $plage->description = ''.$antiXss->xss_clean($request->description);

        $plage->save();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été modifiée');

    }

    public function destroy($id)
    {

        $plage = Plage::findOrFail($id);

        $plage->delete();
        return redirect()->route('plages.index')->with('success','La plage '.$plage->name.' a été supprimée');

    }
}
