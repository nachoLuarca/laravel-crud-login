@extends('layout')

@section('content')
    <h2>Detalles del producto</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Nombre:</strong> {{ $product->name }}</p>
            <p><strong>Precio:</strong> ${{ number_format($product->price, 0, '.', ',') }}</p>
            <p><strong>Descripción:</strong> {{ $product->description }}</p>
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
@endsection
