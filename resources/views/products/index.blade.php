@extends('layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Listado de Productos</h2>
        <a class="btn btn-success" href="{{ route('products.create') }}">Crear producto</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 0, '.', ',') }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">Ver</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay productos disponibles.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
@endsection
