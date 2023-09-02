@extends('layouts.master')

@section('title', 'Liste des Produits')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mt-4">Liste des Produits
                    <a href="{{url('admin/add-produit')}}" class="btn btn-primary float-end">Ajouter un Produit</a>
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
                            <th scope="col">Photo de Produit</th>
                            <th scope="col">Code d'article</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Prix(DHs)</th>
                            <th scope="col">Fournisseurs</th>
                            <th scope="col">Marques</th>
                            <th scope="col">Note</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produit as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>
                                    <img src="{{asset($item->photo)}}"  width="50px" height="50px" alt="Img">
                                </td>
                                <td>{{$item->code_article}}</td>
                                <td>{{$item->designation}}</td>
                                <td>{{$item->prix}}</td>
                                <td>{{$item->fournisseur}}</td>
                                <td>{{$item->marque}}</td>
                                <td>{{$item->note}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{url('admin/edit-produit/'.$item->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top"  title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{url('admin/delete-produit/'.$item->id)}}">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
@endsection
