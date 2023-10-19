@extends('adminlte::page')

@section('title', 'Liste des vehicules')

@section('content')

    <!-- Bootstrap CSS -->
    <!-- <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
       
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h1 class="m-0 text-black text-white"><i class="fa fa-list"> </i> Liste des véhicules
                      
                            @if(Auth::user()->admin != 5)
                                <a href="{{route('vehicules.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"> <i class="fa fa-plus"></i>
                                     Véhicule
                                </a>
                             @endif
    
<!--                     <a href="#" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"> Ajouter un vehicule ! </a>
 --><!--                     <button type="button" class="btn btn-primary"  class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter un vehicule !</button>
 -->
                    </h1>
                </div>
                <div class="card-body"> 
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
                                <th class="btn-success"><i class="fa fa-ninja"> </i></th>
                                <th class="btn-outline-primary"><i class="fa fa-edit"> </i></th>
                                <th class="btn-outline-danger"><i class="fa fa-trash"> </i></th>
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
                                <!-- douane -->
                               <?php if (Auth::user()->admin == 1): ?>
                                    <?php if ($vehicule->file): ?>
                                        <td style="width: 5%;" class="bg-success">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 5%;" class="bg-danger">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                        
                                    <?php endif ?>
                               <?php endif ?>
                               <!-- DUC -->

                               <?php if (Auth::user()->admin == 5): ?>
                                    <?php if ($vehicule->duc == 1): ?>
                                        <td style="width: 5%;" class="bg-success">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 5%;" class="bg-danger">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                        
                                    <?php endif ?>
                               <?php endif ?>
                               <!-- service des mines -->
                          
                               <?php if (Auth::user()->admin == 2): ?>
                                    <?php if ($vehicule->mine == 1): ?>
                                        <td style="width: 5%;" class="bg-success">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 5%;" class="bg-danger">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                        
                                    <?php endif ?>
                               <?php endif ?>
                               <!-- impot -->

                               <?php if (Auth::user()->admin == 3): ?>
                                    <?php if ($vehicule->impot == 1): ?>
                                        <td style="width: 5%;" class="bg-success">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td style="width: 5%;" class="bg-danger">
                                            <a href="{{route('vehicules.show', $vehicule)}}" class="btn btn-success btn-xs">
                                                <i class="fa fa-eye"> </i>
                                            </a>
                                        </td>
                                        
                                    <?php endif ?>
                               <?php endif ?>
                                <td style="width: 5%;">
                                    <a style="text-align:center;" href="{{route('vehicules.edit', $vehicule)}}" class="btn btn-outline-primary btn-xs">
                                        <i class="fa fa-edit"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="float: right;" href="{{route('vehicules.destroy', $vehicule)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    
    <form action="{{route('vehicules.store')}}" method="post" class="container">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h1 class="m-0 text-black text-white"> <i class="fas fa-fw fa-plus"></i> Ajouter un vehicule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Chapitre du vehicule</label>
                                <input type="text" class="form-control @error('chapitre') is-invalid @enderror" id="exampleInputName" placeholder="Chapitre du vehicule" name="chapitre"  id="chapitre" >
                                @error('chapitre') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputName">Code du vehicule</label>
                                <input type="text" class="form-control @error('codeserv') is-invalid @enderror" id="exampleInputName" placeholder="Code du vehicule" name="codeserv"  id="codeserv" >
                                @error('codeserv') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName">Libellé du vehicule</label>
                                <input type="text" class="form-control @error('libellevehicule') is-invalid @enderror" id="exampleInputName" placeholder="Libellé du vehicule" name="libellevehicule"  id="libellevehicule" >
                                @error('libellevehicule') <span class="text-danger">{{$message}}</span> @enderror
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer un vehicule</button>
                    <a href="{{route('vehicules.index')}}" class="btn btn-danger">
                        Annuler
                    </a>
                </div>
    </form>
    </div>
  </div>
</div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <script>

        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush