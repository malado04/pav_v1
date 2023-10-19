@extends('adminlte::page')

@section('title', ' Ajouter une marques')

@section('content')<br>
    <form action="{{route('marques.store')}}" method="post" class="container">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"> <i class="fa fa-plus"> </i> Ajouter un marque</h1>
                </div>
                <div class="card-body">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-md-6"> -->
                            <div class="form-group">
                                <label for="exampleInputName">Libellé de la marque</label>
                                <input type="text" class="form-control @error('libellemarque') is-invalid @enderror" id="exampleInputName" placeholder="Libellé de la marque" name="libellemarque"  id="libellemarque" >
                                @error('marque') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{route('marques.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop