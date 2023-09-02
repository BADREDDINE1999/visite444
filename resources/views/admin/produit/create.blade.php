@extends('layouts.master')

@section('title', 'Ajouter un Produit')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mt-4">Nouveau Produits</h1>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{url('admin/add-produit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="code_article">Code d'article</label>
                        <input type="text" name="code_article" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="designation">designation</label>
                        <input type="text" name="designation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prix">Prix </label>
                        <input type="text" name="prix" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fournisseur">Fournisseurs</label>
                        <input type="text" name="fournisseur" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="marque">Marque</label>
                        <input type="text" name="marque" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="note">Note</label>
                        <input type="text" name="note" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type">Type</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="photo">Photo du Produit</label>
                        <input type="file" name="photo" class="form-control">
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
