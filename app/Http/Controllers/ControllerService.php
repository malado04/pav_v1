<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerService extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('services.index', [
            'services' => $services
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
        return view('services.create');
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

        if (Service::where('codeserv', $request->codeserv)->exists()) {

            return redirect()->route('services.create')
                ->with('error_message', 'Ce code de service existe déja, veuillez utiliser un autre SVP');

        } else{

            $service = Service::create([
                // 'chapitre' => $request->chapitre,
                // 'categorie' => $request->categorie,
                'codeserv' => $request->codeserv,
                'libelleservice' => $request->libelleservice,
                'fk_user_id' => $user,
            ]);

            if (!$service) return redirect()->route('services.index')
                ->with('error_message', 'service non créer');

            return redirect()->route('services.index')
                ->with('success_message', 'service créer avec success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service_id = Service::where("id", $service->id)->get(); 

        return view('services.show', [
            'service' => $service_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s_id = Service::find($id);
            return view('services.edit', [
            'service' => $s_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Service = Service::find($id);

        if (Service::where('codeserv', $request->codeserv)->exists()) {

            return redirect()->route('services.create')
                ->with('error_message', 'Ce code de service existe déja, veuillez utiliser un autre SVP');

        } else{

        $user = Auth::user()->id;
        // $Service->chapitre = $request->chapitre;
        // $Service->categorie = $request->categorie;
        $Service->codeserv = $request->codeserv;
        $Service->libelleservice = $request->libelleservice;
        $Service->fk_user_id = $user;
        $Service->save();

          return redirect()->route('services.index')
            ->with('success_message', 'Modification éffectué avec success'); //
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try { 

          $service->delete();
          return redirect()->route('services.index')
            ->with('success_message', 'Service supprimé avec succés');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('services.index')
            ->with('error_message', 'Ce service est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }
}
