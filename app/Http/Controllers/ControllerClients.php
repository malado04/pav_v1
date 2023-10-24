<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControllerClients extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   
            $adm=4;
            $client = User::where("admin", $adm)->get();
            return view('clients.index', [
                'clients' => $client,
            ]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $mdp="passer123";
        $email = strtolower($request->prenom.$request->name.'@pav.com');

        $datet=date('Y');
        $dat = $request->date_naissance;
        $datY= explode("-", $dat); 
        
        $user = User::create([
            'name' => $request->name,
            'code_client' => Str::upper(Str::random(8)),
            'prenom' => $request->prenom,
            'cni' => $request->cni,
            'genre' => $request->genre,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'age' => $datY[0]-$datet,
            'telpor' => $request->tel,
            'adresse' => $request->adresse,
            'situa_matrim' => $request->situa_matrim,
            'nmbr_epouse' => $request->nmbr_epouse,
            'nmbr_enfant' => $request->nmbr_enfant,
            'admin' => 4,
            'email' => $email, 
            'fk_user_id' => Auth::user()->id,
            'password' => Hash::make($mdp),
        ]);
        // var_dump($request->service_affect);

        if (!$user) return redirect()->route('clients.create')
                ->with('error_message', 'Utilisateur non créer');
        return redirect()->route('clients.index')
            ->with('success_message', 'Utilisateur créer avec success');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $client= User::where("id", $id)->get();

        return view('clients.show', [
            'client' => $client[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::find($id);

        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = User::find($id);
             
        $client->cni = $request->cni;
        $client->name = $request->name;
        $client->prenom = $request->prenom;
        $client->telpor = $request->tel;
        $client->adresse = $request->adresse;
        $client->genre = $request->genre;
        $client->date_naissance = $request->date_naissance;
        $client->lieu_naissance = $request->lieu_naissance;
        $client->email = $request->email;
        $client->fk_up_id = Auth::user()->id;
        $client->save();
        return redirect()->route('clients.index')
            ->with('success_message', 'Modification effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeur  $employeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $client = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('clients.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($client) $client->delete();
        return redirect()->route('clients.index')
            ->with('success_message', 'Supprimée');
    }

}
