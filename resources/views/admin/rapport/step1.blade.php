@extends('layouts.master')

@section('title', 'Ajouter un Produit')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="m-4">Nouveau Rapport</h1>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{url('admin/step1')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-4">
                        <label class="form-label">Selectioner un client</label>
                        <select class="form-control" name="client_id" required>
                            <option value="" >Selectionner </option>
                            @foreach($client as $item)
                            <option value="{{$item->id}}" >{{$item->nom_client}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="col m-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary px-5" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"><i class="bi bi-person-fill"></i>Nouveau Client</button>
                    </div>
                        <div class="m-4">
                        <label class="form-label">Date de Visite:</label>
                        <input name="date_visite" type="date" class="form-control" required>
                    </div>
                    <div class="m-4">
                        <label class="form-label">Heure d'entrée:</label>
                        <input name="date_entre" type="time" class="form-control" required>
                    </div>
                    <div class="m-4">
                        <label class="form-label">Heure de sortie:</label>
                        <input name="date_sortie" type="time" class="form-control" required>
                    </div>
                    <div class="row m-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Suivant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal nouveau client ---------------------------------------------------------------------------------- -->
    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="row g-3" action="{{url('admin/add-client')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nouveau Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="card">
                        <div class="p-4 border rounded">
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
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end Modal nouveau client---------------------------------------------------------------------------->
@endsection
