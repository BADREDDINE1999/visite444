@extends('layouts.master')

@section('title', 'Modifier un Rapport')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="mt-4">Modifier un Rapport</h1>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif

            <form action="{{ route('admin.reports.update', $report->id) }}" method="POST">
                @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="step">Étape</label>
                    <input type="text" name="step" value="{{ $report->step }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="date">Date</label>
                    <input type="date" name="date" value="{{ $report->date }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="client">Client</label>
                    <input type="text" name="client" value="{{ $report->client }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="status">Statut</label>
                    <input type="text" name="status" value="{{ $report->status }}" class="form-control" />
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
