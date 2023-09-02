@extends('layouts.master')

@section('title', 'Liste des Clients')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mt-4">Liste des clients
                <a href="{{url('admin/add-client')}}" class="btn btn-primary btn-bg float-end">Ajouter un client</a></h1>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom Complet</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Société</th>
                                <th scope="col">Téléphne</th>
                                <th scope="col">Téléphne2</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Région</th>
                                <th scope="col">Localisation</th>
                                <th scope="col">Gamme de commercialisation</th>
                                <th scope="col">Marques de commercialisation</th>
                                <th scope="col">Fournisseurs</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->nom_client}}</td>
                                <td>
                                   <img src="{{asset($item->photo)}}"  width="50px" height="50px" alt="Img">
                                </td>
                                <td>{{$item->societe}}</td>
                                <td>{{$item->tele_client}}</td>
                                <td>{{$item->tele_client2}}</td>
                                <td>{{$item->ville}}</td>
                                <td>{{$item->region}}</td>
                                <td>{{$item->localisation}}</td>
                                <td>{{$item->game_commercialise}}</td>
                                <td>{{$item->marque_commercialise}}</td>
                                <td>{{$item->fournisseur}}</td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{url('admin/edit-client/'.$item->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{url('admin/delete-client/'.$item->id)}}">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                <!--<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Société</th>
                            <th>Téléphne</th>
                            <th>Téléphne2</th>
                            <th>Ville</th>
                            <th>Région</th>
                            <th>Localisation</th>
                            <th>Gamme de commercialisation</th>
                            <th>Marques de commercialisation</th>
                            <th>Fournisseurs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client as $item)
                        <tr>
                            <td>{{$item->nom_client}}</td>
                            <td>{{$item->societe}}</td>
                            <td>{{$item->tele_client}}</td>
                            <td>{{$item->tele_client2}}</td>
                            <td>{{$item->ville}}</td>
                            <td>{{$item->region}}</td>
                            <td>{{$item->localisation}}</td>
                            <td>{{$item->game_commercialise}}</td>
                            <td>{{$item->marque_commercialise}}</td>
                            <td>{{$item->fournisseur}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>-->
            </div>
        </div>
    </div>
@endsection
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

