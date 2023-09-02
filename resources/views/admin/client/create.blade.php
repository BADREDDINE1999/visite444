@extends('layouts.master')

@section('title', 'Clients')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="">Ajouter un Client</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <form action="{{url('admin/add-client')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_client">Non Complet</label>
                            <input type="text" name="nom_client" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="societe">Nom de Société </label>
                            <input type="text" name="societe" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tele_client">Téléphone</label>
                            <input type="text" name="tele_client" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tele_client2">Téléphone2</label>
                            <input type="text" name="tele_client2" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="region">Région</label>
                            <input type="text" name="region" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="localisation">Localisation</label>
                            <input type="text" name="localisation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="photo">Photo de magasin</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="game_commercialise">Gammes commercialisées</label>
                            <input type="text" name="game_commercialise" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="marque_commercialise">Marques commercialisées</label>
                            <input type="text" name="marque_commercialise" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="fournisseur">Fournisseurs</label>
                            <input type="text" name="fournisseur" class="form-control">
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


