@extends('adminlte::page')
@section('title', 'Modifier un vehicule')
@section('content')<br>

    <form action="{{route('vehicules.update', $vehicule)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h1 class="m-0 text-black"> <i class="fas fa-fw fa-plus"></i> Véhicule </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputName">Marque</label>
                                    <select class="form-control @error('essence') is-invalid @enderror" id="exampleInputName"  name="marque"  id="marque" >
                                        <option value="Audi"> Audi </option>
                                        <option value="Bmw"> Bmw </option>
                                        <option value="Citroen"> Citroen </option>
                                        <option value="Dacia"> Dacia </option>
                                        <option value="Ford"> Ford </option>
                                        <option value="Hyundai"> Hyundai </option>
                                        <option value="Kia"> Kia </option>
                                        <option value="Mercedes"> Mercedes </option>
                                        <option value="Peugeot"> Peugeot </option>
                                        <option value="Renault"> Renault </option>
                                        <option value="Toyota"> Toyota </option>
                                        <option value="Volkswagen"> Volkswagen </option>
                                        <option value="Alfa-romeo"> Alfa-romeo </option>
                                        <option value="Chevrolet"> Chevrolet </option>
                                        <option value="Dodge"> Dodge </option>
                                        <option value="Ds"> Ds </option>
                                        <option value="Fiat"> Fiat </option>
                                        <option value="Honda"> Honda </option>
                                        <option value="Infinity"> Infinity </option>
                                        <option value="Isuzu"> Isuzu </option>
                                        <option value="Jaguar"> Jaguar </option>
                                        <option value="Jeep"> Jeep </option>
                                        <option value="Lancia"> Lancia </option>
                                        <option value="Land-rover"> Land-rover </option>
                                        <option value="Lexus"> Lexus </option>
                                        <option value="Mazda"> Mazda </option>
                                        <option value="Mazerati"> Mazerati </option>
                                        <option value="Mg"> Mg </option>
                                        <option value="Mini"> Mini </option>
                                        <option value="Mitsubishi"> Mitsubishi </option>
                                        <option value="Nissan"> Nissan </option>
                                        <option value="Opel"> Opel </option>
                                        <option value="Porsche"> Porsche </option>
                                        <option value="Seat"> Seat </option>
                                        <option value="Skoda"> Skoda </option>
                                        <option value="Smart"> Smart </option>
                                        <option value="Ssangyong"> Ssangyong </option>
                                        <option value="Subaru"> Subaru </option>
                                        <option value="Suzuki"> Suzuki </option>
                                        <option value="Tesla"> Tesla </option>
                                        <option value="Volvo"> Volvo </option>
                                        
                                    </select>
                                    @error('marque') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3"> 
                                <div class="form-group">
                                    <label for="exampleInputName">Consommation (Essence / Gazoil)</label>
                                    <select class="form-control @error('essence') is-invalid @enderror" id="exampleInputName"  name="essence"  id="essence">
                                        <option value="Essence">Essence</option>
                                        <option value="Gazoil">Gazoil</option>
                                    </select>
                                    @error('essence') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div>
                            <div class="col-md-3"> 
                                <div class="form-group">
                                    <label for="exampleInputName">Type - Catégorie du véhicule</label>
                                    <select class="form-control @error('essence') is-invalid @enderror" id="exampleInputName"  name="type"  id="type">
                                        <option value="Catégorie A : mini-citadines">Catégorie A : mini-citadines</option>
                                        <option value="Catégorie B : petites voitures">Catégorie B : petites voitures</option>
                                        <option value="Catégorie C : voitures compactes">Catégorie C : voitures compactes</option>
                                        <option value="Catégorie D : grosses voitures">Catégorie D : grosses voitures</option>
                                        <option value="Catégorie E : voitures de prestige">Catégorie E : voitures de prestige</option>
                                        <option value="Catégorie F : voitures de luxe">Catégorie F : voitures de luxe</option>
                                        <option value="Catégorie J : SUV">Catégorie J : SUV</option>
                                        <option value="Catégorie M : grandes voitures familiales">Catégorie M : grandes voitures familiales</option>
                                        <option value="Catégorie S : voitures de sport">Catégorie S : voitures de sport</option>
                                    </select>
                                    @error('type') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div>
                            <div class="col-md-3">  
                                <div class="form-group">
                                    <label for="exampleInputName">Modeles du véhicule</label>
                                    <select  class="form-control @error('modeles') is-invalid @enderror" id="exampleInputName" placeholder="Code du véhicule" name="modeles"  id="modeles" >
                                        <?php foreach ($modeles as $key => $value): ?>
                                            <option value="{{$value->id}}">{{$value->libellemodele}}</option>
                                        <?php endforeach ?>
                                    </select>
                                    @error('modeles') <span class="text-danger">{{$message}}</span> @enderror
                                </div>  
                            </div>
                            <div class="col-md-3"> 
                                <div class="form-group">
                                    <label for="exampleInputName">Puissance du véhicule  en ch</label>
                                    <input type="number" class="form-control @error('puissances') is-invalid @enderror" value="{{$vehicule->puissances}}" id="exampleInputName" placeholder="Puissance du véhicule  en ch" name="puissances"  id="puissances" >
                                    @error('puissances') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputName">Numéro carte grise du véhicule</label>
                                    <input type="number" min="0" class="form-control @error('numerocartegrise') is-invalid @enderror" value="{{$vehicule->numerocartegrise}}" id="exampleInputName" placeholder="Numéro carte grise du véhicule" name="numerocartegrise"  id="numerocartegrise" >
                                    @error('numerocartegrise') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-taxi"> Modifier un vehicule</i></button>
                        <a href="{{route('vehicules.index')}}" class="btn btn-danger">
                            <i class="fa fa-taxi"> Annuler</i>
                        </a>
                    </div>
                </div>
            <!-- </div> -->
        </div>
@stop