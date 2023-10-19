<!-- @extends('adminlte::page')
@section('title', 'Affichage service')  -->
@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-eye"></i><i> Affichage d'un service</i>
                     </h3>
                </div>
               <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <fieldset class="p-3 border border-info border-4">
                            <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Information sur le service</i></h5></legend>
                             <div class="form-group">
                                <h4><label for="exampleInputName"><i class="fas fa-user"></i> Libelle service</label></h4>
                                <?php foreach ($service as $key => $service): ?>

                                <input type="text" class="bg-white border-white form-control @error('libelleservice') is-invalid @enderror" id="exampleInputName" placeholder="libelleservice service" name="libelleservice" value="{{$service->libelleservice ?? $service->libelleservice ?? old('libelleservice')}}"readonly>
                                @error('libelleservice') <span class="text-danger">{{$message}}</span> @enderror

                                <?php endforeach ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button> -->
                    <a href="{{route('services.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop