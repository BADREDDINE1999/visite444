@extends('layouts.master')

@section('title', 'Liste des Rapports')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="mt-4">
                Liste des Rapports
                <a href="{{url('admin/step1')}}" class="btn btn-primary float-end">Ajouter un Rapport</a>
                
            </h1>
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
                            <th scope="col">Nom du Client</th>
                            <th scope="col">Date de visite</th>
                            <th scope="col">Heure d'entrée</th>
                            <th scope="col">Heure de sortie</th>
                            <th scope="col">Produits proposés au Client</th>
                            <th scope="col">Produits demandés par le Client disponibles</th>
                            <th scope="col">Produits demandés par le Client non disponibles</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rapports as $rapport)
                        <tr>
                            <th scope="row">{{$rapport->id}}</th>
                            <td>{{$rapport->customer_name}}</td>
                            <td>{{$rapport->visit_date}}</td>
                            <td>{{$rapport->entry_time}}</td>
                            <td>{{$rapport->exit_time}}</td>
                            <td>{{$rapport->products_offered}}</td>
                            <td>{{$rapport->requested_products_available}}</td>
                            <td>{{$rapport->requested_products_not_available}}</td>
                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <a href="{{url('admin/edit-rapport/'.$rapport->id)}}">
                                            <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Modifier">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{url('admin/delete-rapport/'.$rapport->id)}}">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
