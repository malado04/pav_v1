<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerMarque extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $marques = Marque::all();
        return view('marques.index', [
            'marques' => $marques
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marques.create');
        //
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

        if (Marque::where('libellemarque', $request->libellemarque)->exists()) {

            return redirect()->route('marques.create')
                ->with('error_message', 'Ce libellé existe déja, veuillez utiliser un autre SVP');

        } else{

            $marque = Marque::create([
                'libellemarque' => $request->libellemarque,
                'fk_user_id' => $user,
            ]);

            if (!$marque) return redirect()->route('marques.index')
                ->with('error_message', 'marque non créer');

            return redirect()->route('marques.create')
                ->with('success_message', 'marque créer avec success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        
        $marque_id = Marque::where("id", $marque->id)->get(); 

        return view('marques.show', [
            'marque' => $marque_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $m_id = Marque::find($id); 
            return view('marques.edit', [
            'marque' => $m_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $marq = Marque::find($id);

        if (Marque::where('libellemarque', $request->libellemarque)->exists()) {

            return redirect()->route('marques.edit', $marq)
                 ->with('error_message', 'Cette marque existe déja dans la base');
        } else {

            $marq->libellemarque = $request->libellemarque;
            $marq->save();
            return redirect()->route('marques.index')
                ->with('success_message', 'Modification effectuée avec success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        try { 

          $marque->delete();
          return redirect()->route('marques.index')
            ->with('success_message', 'Marque supprimé avec succés');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('marques.index')
            ->with('error_message', 'Cette marque est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }
}
