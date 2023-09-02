@extends('layouts.master')

@section('title', 'Feedback du client')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="">Feedback du client</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{url('admin/step4')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-4">
                        <h6 class="mb-0 text-uppercase">Produits demandés</h6>
                        @foreach($produitdmd as $item)
                        <label class="form-label">Produit: {{$item->code_article}} </label>
                        <input type="text" name="qte[]"  class="form-control" placeholder="Quantité">`
                        @endforeach
                        <h6 class="mb-0 text-uppercase">Produits proposés</h6>
                        @foreach($produitprp as $item)
                        <label class="form-label">Produit: {{$item->code_article}} </label>
                        <input type="text" name="Feedback[]"  class="form-control" placeholder="Quantité">`
                        @endforeach
                    </div>      
                </form>        
            </div>
        </div> 
    </div>   
@endsection    