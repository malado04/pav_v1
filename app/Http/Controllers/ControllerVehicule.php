<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Modele;
use App\Models\User;
use App\Models\Marque;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ControllerVehicule extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veh = Vehicule::all();
        return view('vehicules.index', [
            'vehicules' => $veh
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mod = Modele::all();
        $mar = Marque::all();
        $cli = User::where("admin", 4)->get();
        return view('vehicules.create', [
            'modeles' => $mod,
            'marques' => $mar,
            'clients' => $cli,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file) {
            
            $veh = Vehicule::find($request->id);

            if (Auth::user()->admin == 1) {
                $path = $request->file('file')->store('uploads');
                $veh->file=$path ?? "Aucune";
            } 

            if (Auth::user()->admin == 5) {
                $veh->duc = 1;
                $path = $request->file('file')->store('uploads');
                $veh->fileduc=$path ?? "Aucune";
            } 

            if (Auth::user()->admin == 2) {
                $veh->mine = 1;
                $path = $request->file('file')->store('uploads');
                $veh->filemine=$path ?? "Aucune";
            } 

            if (Auth::user()->admin == 3) {
                $veh->impot = 1;
                $path = $request->file('file')->store('uploads');
                $veh->fileimpot=$path ?? "Aucune";
            } 
            
            $veh->save();

            return redirect()->route('vehicules.show', $request->id)
            ->with('success_message', 'Véhicule créer avec success');

        } else {

            $veh = Vehicule::create([

            'fk_client_id' => $request->fk_client_id,
            'fk_marque_id' => $request->marques,
            'essence' => $request->essence,
            'type' => $request->type,
            'fk_modele_id' => $request->modeles,
            'puissances' => $request->puissances,
            'numerocartegrise' => $request->numerocartegrise,
            'fk_user_id' => Auth::user()->id,
        ]);

        if (!$veh) return redirect()->route('vehicules.create')
                ->with('error_message', 'Véhicule non créer');

        return redirect()->route('vehicules.index')
            ->with('success_message', 'Véhicule créer avec success');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $veh = Vehicule::find($id);
        return view('vehicules.show', [
            'vehicule' => $veh,
        ]);


    }

          


           

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $veh = Vehicule::find($id);
        $mod = Modele::all();
        $mar = Marque::all();
        return view('vehicules.edit', [
            'vehicule' => $veh,
            'modeles' => $mod,
            'marques' => $mar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    { 
        

        $Service = Vehicule::find($id);
        $user = Auth::user()->id;

        $Service->fk_marque_id = $request->marque;
        $Service->type = $request->type;
        $Service->fk_modele_id = $request->modeles;
        $Service->puissances = $request->puissances;
        $Service->essence = $request->essence;
        $Service->numerocartegrise = $request->numerocartegrise;
        $Service->fk_up_id = $user;
        $Service->save();

        return redirect()->route('vehicules.index')
            ->with('success_message', 'Modification éffectué avec success'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }
}
