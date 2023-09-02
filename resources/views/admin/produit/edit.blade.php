@extends('layouts.master')

@section('title', 'Modifier un Produit')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mt-4">Modifier un Produit </h1>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{url('admin/update-produit/'.$produit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="code_article">Code d'article</label>
                        <input type="text" name="code_article" value="{{$produit->code_article}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Designation">designation</label>
                        <input type="text" name="designation"  value="{{$produit->designation}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prix">Prix </label>
                        <input type="text" name="prix" value="{{$produit->prix}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fournisseur">Fournisseurs</label>
                        <input type="text" name="fournisseur" value="{{$produit->fournisseur}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="marque">Marque</label>
                        <input type="text" name="marque" value="{{$produit->marque}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="note">Note</label>
                        <input type="text" name="note" value="{{$produit->note}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="type">Type</label>
                        <input type="text" name="type" value="{{$produit->type}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="photo">Photo du Produit</label>
                        <input type="file" name="photo" value="{{$produit->photo}}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
