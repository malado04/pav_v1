@extends('adminlte::page')

@section('title', 'Liste des modeles')

@section('content')
<br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h1 class="m-0 text-black"><i class="fa fa-list"> </i> Liste des modeles
                        <a href="{{route('modeles.create')}}" class="btn btn-info mb-2 border border-radius border-2 border-white" style="float:right;"> <i class="fa fa-fa-braille"></i>
                             Ajouter un modele
                        </a>
                    </h1>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Libelle modele</th>
                            <th class="btn-success"><i class="fa fa-eye"> </i></th>
                            <th class="btn-primary"><i class="fa fa-edit"> </i></th>
                            <th class="btn-danger"><i class="fa fa-trash"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modeles as $key => $modele)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$modele->libellemodele}}</td>
                                <td style="width: 5%;">
                                    <a href="{{route('modeles.show', $modele)}}" class="btn btn-success btn-xs">
                                        <i class="fa fa-eye"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="text-align:center;" href="{{route('modeles.edit', $modele)}}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit"> </i>
                                    </a>
                                </td>
                                <td style="width: 5%;">
                                    <a style="float: right;" href="{{route('modeles.destroy', $modele)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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