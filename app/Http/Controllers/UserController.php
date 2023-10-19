<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('users.create');
        $svrc = Service::all();
        return view('users.create', [
            'svrcs' => $svrc,
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
       
       if ($request->affect) {
            $user = User::find($request->affect);
            $svrc = Service::all();
            // var_dump($user->id);

            if (!$user) return redirect()->route('users.index')
                ->with('error_message', 'User dengan id'.$request->id.' tidak ditemukan');
            return view('users.edit', [
                'svrcs' => $svrc,
                'user' => $user
            ]);
        } else {
            
        // if (User::where('nmro_matric',  $request->nmro_matric)->exists()) {
        //     return redirect()->route('users.create')
        //     ->with('error_message', 'Ce matricule existe déja, veuillez utiliser une autre svp');
        // } 
        // if (User::where('telpor', '=', $request->tel)->exists()) {
        //     return redirect()->route('users.create')
        //     ->with('error_message', 'Ce tel existe déja, veuillez utiliser une autre svp');
        // }     
        // if (User::where('email', '=', $request->email)->exists()) {
        //     return redirect()->route('users.create')
        //     ->with('error_message', 'Ce email existe déja, veuillez utiliser une autre svp');
        // } 
        
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
            'nom_cntct' => $request->nom_cntct,
            'prenom_cntct' => $request->prenom_cntct,
            'tel_cntct' => $request->tel_cntct,
            'adresse_cntct' => $request->adresse_cntct,
            'admin' => $request->admin,
            'email' => $email,
            'fk_service_id' => $request->service_affect,
            // 'fk_poste_id' => $request->poste_affect,
            'fk_user_id' => Auth::user()->id,
            'password' => Hash::make($mdp),
        ]);
        // var_dump($request->service_affect);
        if (!$user) return redirect()->route('users.create')
                ->with('error_message', 'Utilisateur non créer');
        return redirect()->route('users.index')
            ->with('success_message', 'Utilisateur créer avec success');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (User::where('id',  $id)->exists()) {
            
            $cotisation = Cotisation::where("fk_agent_id", $id)->get();
            $pri = Prime::where("fk_agent_id", $id)->get();
            $ind = Indemnite::where("fk_agent_id", $id)->get();
            $ret = Retenue::where("fk_agent_id", $id)->get();
            $user = User::where('id', $id)->get(); //Auth::user()->id;
            $svrc = Service::all();
            $pst = Poste::all();
            // $user->name = Auth::user()->name;
            // $user->email = Auth::user()->email;
            if (!$user) return redirect()->route('users.index')
                ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
            return view('users.show', [
                'user' => $user[0],
                'svrcs' => $svrc,
                'psts' => $pst,
                'primes' => $pri,
                'indemnites' => $ind,
                'retenues' => $ret,
                'cotisation' => $cotisation,
            ]);
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $svrc = Service::all();

        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('users.edit', [
            'svrcs' => $svrc,
            'user' => $user
        ]);
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
        // $request->validate([
        //     'nom' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'password' => 'sometimes|nullable|confirmed'
        // ]);
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
             $user->nmbr_epouse = $request->nmbr_epouse;
             $user->nmbr_enfant = $request->nmbr_enfant;
             $user->nom_cntct = $request->nom_cntct;
             $user->prenom_cntct = $request->prenom_cntct;
             $user->tel_cntct = $request->tel_cntct;
             $user->adresse_cntct = $request->adresse_cntct;
             $user->admin = $request->admin;

        $user->save();
        return redirect()->route('users.index')
            ->with('success_message', 'Modification effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Supprimée');
    }

    public function profile(User $user)
    {
        $this->authorize('Owner', $user);
        return view('/profile.username/{user}', compact('user',$user));

    }

}
