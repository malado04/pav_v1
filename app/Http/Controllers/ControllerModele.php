<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerModele extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $modeles = Modele::all();
        return view('modeles.index', [
            'modeles' => $modeles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modeles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;

        if (Modele::where('libellemodele', $request->libellemodele)->exists()) {

            return redirect()->route('modeles.create')
                ->with('error_message', 'Ce libellé existe déja, veuillez utiliser un autre SVP');

        } else{

            $modele = Modele::create([
                'libellemodele' => $request->libellemodele,
                'fk_user_id' => $user,
            ]);

            if (!$modele) return redirect()->route('modeles.index')
                ->with('error_message', 'modele non créer');

            return redirect()->route('modeles.create')
                ->with('success_message', 'modele créer avec success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        
        $modele_id = Modele::where("id", $modele->id)->get(); 

        return view('modeles.show', [
            'modele' => $modele_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        $modele_id = Modele::where("id", $modele->id)->get(); 
        var_dump($modele_id);
            return view('modeles.edit', [
            'modele' => $modele_id,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $modele = Modele::find($id);
        $modele->libellemodele = $request->libellemodele;
        $modele->save();

          return redirect()->route('modeles.index')
            ->with('success_message', 'Modification éffectué avec success'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        try { 

          $modele->delete();
          return redirect()->route('modeles.index')
            ->with('success_message', 'modele supprimé avec succés');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('modeles.index')
            ->with('error_message', 'Ce modele est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }
}
