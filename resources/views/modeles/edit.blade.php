@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop

@section('content')
    <form action="{{route('modeles.update', $modele)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName"><i class="fa fa-fa-braille"></i> Libellé du modele</label>
                        <input type="text" class="form-control @error('libellemodele') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du modele" name="libellemodele" value="{{$modele->libellemodele ?? old('libellemodele')}}">
                        @error('libellemodele') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-user"> Modifier</i></button>
                    <a href="{{route('modeles.index')}}" class="btn btn-danger">
                        <i class="fa fa-user"> Annuler</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop