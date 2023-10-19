@extends('adminlte::page')
@section('title', 'C-P-N')
@section('content_header')

    <h4 class="m-0 text-dark">
          <b> Tableau de bord</b>
        <span class="float-right">
        </span>
    </h4>
@stop
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary"> 
                    <h3> Procedures d'Achat de Voiture
                        <!-- <a href="#" class="text-white btn btn-outline-info border border-radius border-2 border-white" style="float:right; margin-right: 2%;" onClick="imprimer('sectioPrintMois')">
                            <i class="fas fa-fw fa-print"></i>  Statistique !
                         </a> -->
                    </h3>
                </div>
                <div class="card-body"> 

                  @if(isset($user))

    <form action="{{route('userupdate.update', $user)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h2 class="m-0 text-white"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i> Completer mes informations</h2>
                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name"  value="{{$user->name}}" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom </label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{$user->prenom}}" required>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI </label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni" value="{{$user->cni}}" required>
                                @error('cni') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Genre </label>
                                <select class="form-control @error('genre') is-invalid @enderror" id="" placeholder="Genre" name="genre" >
                                    <optgroup label="Masculin">
                                        <option value="M">Masculin</option>
                                    </optgroup>
                                    <optgroup label="Féminin">
                                        <option value="F">Féminin</option>
                                    </optgroup>
                                </select>
                                @error('genre') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Date de naissance </label>
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance" name="date_naissance" value="{{$user->date_naissance}}" required>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance </label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" value="{{$user->lieu_naissance}}" required>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Téléphone </label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" value="{{$user->tel}}" required>
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse </label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{$user->adresse}}" required>
                                @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Situation matrimoniale </label>
                                <select class="form-control @error('situa_matrim') is-invalid @enderror" id="" placeholder="situa_matrim" name="situa_matrim" >
                                    <optgroup label="Marié (e)">
                                        <option value="Marié (e)">Marié (e)</option>
                                    </optgroup>
                                    <optgroup label="Célibataire">
                                        <option value="Célibataire">Célibataire</option>
                                    </optgroup>
                                </select>
                                @error('situa_matrim') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                   </fieldset><br>
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations sur la personne à contacter</legend>
                        <div class="row">
                        <div class="col-md-4"><br> 
                            <div class="form-group">
                                <label for="">Nom  </label>
                                <input type="text" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nom" name="nom_cntct" value="{{$user->nom_cntct}}" required>
                                @error('nom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Prénom  </label>
                                <input type="text" class="form-control @error('prenom_cntct') is-invalid @enderror" id="" placeholder="Prénom contact" name="prenom_cntct" value="{{$user->prenom_cntct}}" required>
                                @error('prenom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Téléphone  </label>
                                <input type="number" class="form-control @error('tel_cntct') is-invalid @enderror" id="" placeholder="Téléphone contact" name="tel_cntct" value="{{$user->tel_cntct}}" required>
                                @error('tel_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                            </div>                        
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Adresse  </label>
                                <input type="text" class="form-control @error('adresse_cntct') is-invalid @enderror" id="" placeholder="Adresse contact" name="adresse_cntct" value="{{$user->adresse_cntct}}" required>
                                @error('adresse_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                   </fieldset>
                    </div>



                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-3">
                    <button type="submit" class="btn btn-info form-control">Modifier l'agent</button></div>
                        <div class="col-md-3">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

                  @endif


                    <div class="container-cluid">
                     
                      <table class="table table-hover table-bordered table-stripped" id="example2">
                          <thead>
                              <tr>
                                <th>Client</th>
                                <th>Marque</th>
                                <th>Type </th>
                                <th>Modeles </th>
                                <th>Puissances </th>
                                <th>Essence </th>
                                <th>Numero carte grise </th>
                                <th>Douane </th>
                                <th>Service des mines </th>
                                <th>Impots et Domaines </th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($vehicules as $key => $vehicule)
                              <tr>
                                <td>{{optional($vehicule->client)->cni}} {{optional($vehicule->client)->name}} {{optional($vehicule->client)->prenom}}</td>
                                <td>{{optional($vehicule->marque)->libellemarque}}</td>
                                <td>{{$vehicule->type}}</td>
                                <td>{{optional($vehicule->modele)->libellemodele}}</td>
                                <td>{{$vehicule->puissances}}</td>
                                <td>{{$vehicule->essence}}</td>
                                <td>{{$vehicule->numerocartegrise}}</td>
                                <td class="btn-danger"></td>
                                <td class="btn-danger"></td>
                                <td class="btn-danger"></td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
@stop


@push('js')
    <script>

        $('#example2').DataTable({
            "responsive": true,
        });

    </script>
@endpush