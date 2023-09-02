@extends('layouts.master')

@section('title', 'Produits demandés et proposés')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="">Produits demandés et proposés</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/step3')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-4">
                        <label class="form-label">Produits demandés par Client disponibles</label>
                        <select name="produitsdemande[]" class="form-control selectpicker" data-placeholder="Choose anything" multiple="multiple" data-live-search="true">
                            <option value="" >Selectionner </option>
                            @foreach($produit as $item)
                            <option value="{{$item->id}}" >{{$item->code_article}}</option>
                            @endforeach
                        </select>   
                    </div>    
                    <div class="m-4">
                        <label class="form-label">Produits demandés par Client non disponibles</label>
                        <select name="produitsdemandendp[]" class="form-control selectpicker" data-placeholder="Choose anything" multiple="multiple" data-live-search="true">
                            <option value="" >Selectionner </option>
                            @foreach($produit as $item)
                            <option value="{{$item->id}}" >{{$item->code_article}}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="m-4">
                        <label class="form-label">Produits Proposés au Client</label>
                        <select name="produitsprp[]" class="form-control selectpicker" data-placeholder="Choose anything" multiple="multiple" data-live-search="true">
                            <option value="" >Selectionner </option>
                            @foreach($produit as $item)
                            <option value="{{$item->id}}">{{$item->code_article}}</option>
                            @endforeach
                        </select>   
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
@endsection
