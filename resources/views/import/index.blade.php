@extends('layouts.app')

@section('title', 'Importar')

@section('content')
@if (session('msg'))
<div class="alert alert-danger" role="alert">
    {{ session('msg') }}
</div>
@endif
<form method="POST" action="{{ route('import.send') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="saleFiles" class="form-label">Selecione seus arquivos .txt para importação</label>
            <input class="form-control" type="file" id="saleFiles" name="saleFiles[]" accept=".txt" multiple required>
        </div>
        <div class="col-md-6 mt-4">
            <button type="submit" class="btn btn-primary">Importar</button>
            <button class="btn btn-secondary">Limpar</button>
        </div>
    </div>
</form>
@endsection