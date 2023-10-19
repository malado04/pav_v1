<!-- @extends('adminlte::page')
@section('title', 'Affichage marque')  -->
@section('content')<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="m-0 text-black"><i class="fas fa-fw fa-eye"></i><i> Affichage d'une marque</i>
                     </h3>
                </div>
               <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <fieldset class="p-3 border border-info border-4">
                            <legend class="margin-left-20 bg-info text-white p-2  w-75 border border-info border-4"><h5><i ><i class="img-circle p-2 fas fa-fw fa-info border border-white"></i> Information sur le marque</i></h5></legend>
                             <div class="form-group">
                                <h4><label for="exampleInputName"><i class="fas fa-cube"></i> Libelle marque</label></h4>
                                <?php foreach ($marque as $key => $marque): ?>

                                <input type="text" class="bg-white border-white form-control @error('libellemarque') is-invalid @enderror" id="exampleInputName" placeholder="libellemarque marque" name="libellemarque" value="{{$marque->libellemarque ?? $marque->libellemarque ?? old('libellemarque')}}"readonly>
                                @error('libellemarque') <span class="text-danger">{{$message}}</span> @enderror

                                <?php endforeach ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                </div>
                <div class="card-footer">
                    <!-- <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Enregistrer</button> -->
                    <a href="{{route('marques.index')}}" class="btn btn-danger">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <i class="fas fa-sign-out"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop