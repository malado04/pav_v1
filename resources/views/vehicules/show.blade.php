<!-- @extends('adminlte::page')
@section('title', 'Affichage service')  -->
@section('content')<br>

<style>
    .fileUpload {
    cursor: pointer; /* "hand" cursor */
}
.input_container {
  border: 2px solid #5bc0de;
}

input[type=file]::file-selector-button {
  background-color: #fff;
  color: #000;
  border: 0px;
  border-right: 2px solid #5bc0de;
  padding: 10px 15px;
  margin-right: 20px;
  transition: .5s;
}

input[type=file]::file-selector-button:hover {
  background-color: #eee;
  border: 0px;
  border-right: 1px solid #e5e5e5;
}
</style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-file"></i><i> Joindre la déclaration</i>
                     </h3>
                </div>
                <form action="{{route('vehicules.store')}}" method="post" enctype="multipart/form-data">
        @csrf

                   <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <fieldset class="p-3 border border-info border-4">
                                <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i>  Joindre la déclaration</i></h5></legend>
                                 <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="{{$vehicule->id}}">
                                    <h4><label for="exampleInputName"><i class="fas fa-user"></i> Fiche de déclaration</label></h4>
                                    <input type="file" class="bg-white p-0 border-info form-control @error('file') is-invalid @enderror" id="exampleInputName"  name="file">
                                    @error('file') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Joindre la déclaration</button>
                        <a href="{{route('vehicules.index')}}" class="btn btn-danger">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <i class="fas fa-sign-out"></i> Annuler
                        </a>
                    </div>

                </form>
                                        <div class="form-group"> 
                    <style>
                    .zoom{
                    width: 50%;
                    height: 50%;

                    }
                    .zoom:hover{
                        position: absolute;
                        z-index: 5;
                        float: left;
                    width: 100%;
                    height: 100%;
                   /**/
                    }
                    </style>

                    <div class="row">
                        <div class="col-md-3">
                        @if ($vehicule->file)
                            <img src="../storage/{{ $vehicule->file}}" alt="Un fichier joint" class="zoom"><br><br><br><br>
                            <a href="../storage/{{$vehicule->file}}" class=""> Afficher la piece jointe</a>
                            @error('acte_mariage') <span class="text-danger">{{$message}}</span> @enderror
                        @endif
                        </div>
                        <div class="col-md-3">
                        @if ($vehicule->fileduc)
                            <img src="../storage/{{ $vehicule->fileduc}}" alt="Un fichier joint" class="zoom"><br><br><br><br>
                            <a href="../storage/{{$vehicule->fileduc}}" class=""> Afficher la piece jointe</a>
                            @error('fileduc') <span class="text-danger">{{$message}}</span> @enderror             

                        @endif               
                        </div>
                        <div class="col-md-3">
                        @if ($vehicule->filemine)
                            <img src="../storage/{{ $vehicule->filemine}}" alt="Un fichier joint" class="zoom"><br><br><br><br>
                            <a href="../storage/{{$vehicule->filemine}}" class=""> Afficher la piece jointe</a>
                            @error('filemine') <span class="text-danger">{{$message}}</span> @enderror            

                        @endif                
                        </div>
                        <div class="col-md-3">
                        @if ($vehicule->fileimpot)
                            <img src="../storage/{{ $vehicule->fileimpot}}" alt="Un fichier joint" class="zoom"><br><br><br><br>
                            <a href="../storage/{{$vehicule->fileimpot}}" class=""> Afficher la piece jointe</a>
                            @error('fileimpot') <span class="text-danger">{{$message}}</span> @enderror           

                        @endif                 
                        </div>
                    </div>
                    </div> 
            </div>
        </div>
    </div>
</div>
@stop