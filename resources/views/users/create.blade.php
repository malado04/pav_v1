@extends('adminlte::page')

@section('title', ' Ajouter un agent')

@section('content')<br>
    <form action="{{route('users.store')}}" method="post" class="container-fluid">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="m-0 text-black"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i> Employer</h2>
                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name" required>
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom </label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" required>
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI </label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni"required>
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
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance" name="date_naissance" required>
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance </label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" required>
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Téléphone </label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" required>
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse </label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" required>
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
                        <div class="col-md-4"><br> 
                            <div class="form-group">
                                <label for="">Profil de l'utilisateur </label>
                                <select class="form-control @error('admin') is-invalid @enderror" id="" placeholder="admin" name="admin" >
                                    <optgroup label="Douanier (e)">
                                        <option value="1">Douanier (e)</option>
                                    </optgroup>
                                    <optgroup label="DUC">
                                        <option value="5">DUC</option>
                                    </optgroup>
                                    <optgroup label="Service des mines">
                                        <option value="2">Agent Service des mines</option>
                                    </optgroup>
                                    <optgroup label="Impots et domaines">
                                        <option value="3">Agent Impots et domaines</option>
                                    </optgroup>
                                    <optgroup label="Client">
                                        <option value="4">Client</option>
                                    </optgroup>
                                </select>
                                @error('admin') <span class="text-danger">{{$message}}</span> @enderror
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
                                <input type="text" class="form-control @error('nmbr_enfant') is-invalid @enderror" id="" placeholder="Nom" name="nom_cntct"  required>
                                @error('nom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Prénom  </label>
                                <input type="text" class="form-control @error('prenom_cntct') is-invalid @enderror" id="" placeholder="Prénom contact" name="prenom_cntct"  required>
                                @error('prenom_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Téléphone  </label>
                                <input type="number" class="form-control @error('tel_cntct') is-invalid @enderror" id="" placeholder="Téléphone contact" name="tel_cntct"  required>
                                @error('tel_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div>                        
                            </div>                        
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Adresse  </label>
                                <input type="text" class="form-control @error('adresse_cntct') is-invalid @enderror" id="" placeholder="Adresse contact" name="adresse_cntct"  required>
                                @error('adresse_cntct') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                   </fieldset>
                    </div>

                    </div>



                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-5">
                        <button type="submit" class="btn btn-info form-control">Enregistrer l'agent</button></div>
                            <div class="col-md-5">
                        <a href="{{route('users.index')}}" class="btn btn-danger form-control">
                            Annuler l'enregistrement
                        </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
         var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("max", today);
document.getElementById("datefield1").setAttribute("max", today);
document.getElementById("datefield2").setAttribute("max", today);
document.getElementById("datefield3").setAttribute("max", today);
    </script>
@endpush