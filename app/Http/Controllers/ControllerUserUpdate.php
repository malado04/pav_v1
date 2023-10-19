<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ControllerUserUpdate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
      */
    public function update(Request $request, $id)
    {

        $user = User::find($id);

             $user->name = $request->name;
             $user->prenom = $request->prenom;
             $user->cni = $request->cni;
             $user->genre = $request->genre;
             $user->date_naissance = $request->date_naissance;
             $user->lieu_naissance = $request->lieu_naissance;
             $user->age = $request->age;
             $user->telpor = $request->tel;
             $user->adresse = $request->adresse;
             $user->situa_matrim = $request->situa_matrim;
             $user->nom_cntct = $request->nom_cntct;
             $user->prenom_cntct = $request->prenom_cntct;
             $user->tel_cntct = $request->tel_cntct;
             $user->adresse_cntct = $request->adresse_cntct;

        $user->save();
        return redirect()->route('home')
            ->with('success_message', 'Modification effectuée avec success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
