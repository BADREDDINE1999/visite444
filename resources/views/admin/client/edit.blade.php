@extends('layouts.master')

@section('title', 'Clients')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="">Edit</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/update-client/'.$client->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nom_client">Nom Complet</label>
                        <input type="text" name="nom_client" value="{{$client->nom_client}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="societe">Nom de Société </label>
                        <input type="text" name="societe" value="{{$client->societe}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tele_client">Téléphone</label>
                        <input type="text" name="tele_client" value="{{$client->tele_client}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tele_client2">Téléphone2</label>
                        <input type="text" name="tele_client2" value="{{$client->tele_client2}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" value="{{$client->ville}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="region">Région</label>
                        <input type="text" name="region" value="{{$client->region}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="localisation">Localisation</label>
                        <input type="text" name="localisation" value="{{$client->localisation}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="photo">Photo de magasin</label>
                        <input type="file" name="photo" value="{{$client->photo}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="game_commercialise">Gammes commercialisées</label>
                        <input type="text" name="game_commercialise" value="{{$client->game_commercialise}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="marque_commercialise">Marques commercialisées</label>
                        <input type="text" name="marque_commercialise" value="{{$client->marque_commercialise}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fournisseur">Fournisseurs</label>
                        <input type="text" name="fournisseur" value="{{$client->fournisseur}}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


