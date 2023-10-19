<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class ControllerProfile extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
        $pst = Poste::all();

        if (!$user) return redirect()->route('users.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('users.edit', [
            'psts' => $pst,
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
        if (isset($request->email)) {
            $user = User::find($id);

                 $user->name = $request->name;
                 $user->email = $request->email;

            $user->save();
            return redirect()->route('profile.index')
                ->with('success_message', 'Modification effectuée avec success');
        }elseif (isset($request->avatar)) {
            $user = User::find($id);

                 $user->name = $request->avatar;

            $user->save();
            return redirect()->route('profile.index')
                ->with('success_message', 'Modification effectuée avec success');
        } else {
            # code...
        }
        
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
