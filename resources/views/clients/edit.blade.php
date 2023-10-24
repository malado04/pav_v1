@extends('adminlte::page')

@section('title', 'Modifier un client')
 
@section('content')<br>
    <form action="{{route('clients.update', $client)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h2 class="m-0 text-black"><i class="fa fa-plus"> </i><i class="fa fa-user"> </i>  Client
                    <a href="{{route('clients.index')}}" class="btn btn-danger" style="float:right;">
                        Retour
                    </a> 
                    </h2>

                </div>
                <div class="card-body">
                   <fieldset>
                       <legend class="card-header bg-dark text-white">Informations personnelles</legend>
                        <div class="row">
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Nom </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Nom" name="name" value="{{$client->name}}" >
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Prénom </label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="" placeholder="Prénom" name="prenom" value="{{$client->prenom}}" >
                                @error('prenom') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">CNI </label>
                                <input type="number" class="form-control @error('cni') is-invalid @enderror" id="" placeholder="CNI" name="cni"value="{{$client->cni}}" >
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
                                <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="" placeholder="Date de naissance" name="date_naissance" value="{{$client->date_naissance}}" >
                                @error('date_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lieu de naissance </label>
                                <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" id="" placeholder="lieu_naissance" name="lieu_naissance" value="{{$client->lieu_naissance}}" >
                                @error('lieu_naissance') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4"><br>
                            <div class="form-group">
                                <label for="">Téléphone </label>
                                <input type="number" class="form-control @error('tel') is-invalid @enderror" id="" placeholder="Téléphone" name="tel" value="{{$client->telpor}}" >
                                @error('tel') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Adresse </label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="" placeholder="Adresse" name="adresse" value="{{$client->adresse}}" >
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
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-user"> Modifier un client</i></button>
                    <a href="{{route('clients.index')}}" class="btn btn-danger">
                        <i class="fa fa-user"> Annuler</i>
                    </a>
                </div>
            </div>
        <!-- </div> -->
    </div>
@stop