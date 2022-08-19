@extends('layouts.app')

@section('title', 'Lista')

@section('content')
@if (session('msg'))
    <div class="alert alert-success" role="alert">
    {{ session('msg') }}
  </div>
@endif
@if (!empty($vendas))
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Comprador</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Endereço</th>
            <th scope="col">Fornecedor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vendas as $venda)
        <tr>
            <th scope="row">{{ $venda->id }}</th>
            <td>{{ $venda->comprador->nome}}</td>
            <td>{{ $venda->produto->nome }}</td>
            <td>@currency($venda->produto->preco)</td>
            <td>{{ $venda->quantidade}}</td>
            <td>{{ $venda->fornecedor->endereco }}</td>
            <td>{{ $venda->fornecedor->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $vendas->links() }}
</div>
<div class="d-flex justify-content-end">
    <h4>Receita total: @currency($total)</h4>
</div>
@else
<p style="font-style: italic;">Ainda não há nenhum dado a ser exibido.</p>
@endif
@endsection