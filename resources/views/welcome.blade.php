@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-center text-2xl font-bold mb-4">Bienvenido a Nuestra Biblioteca</h1>
    <form method="GET" action="{{ url('/') }}" class="mb-4">
        <div class="flex justify-center">
            <input type="text" name="query" placeholder="Buscar libros..." value="{{ $query ?? '' }}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            <button type="submit" class="ml-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Buscar</button>
        </div>
    </form>

    @if(isset($libros) && $libros->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($libros as $libro)
                <div class="bg-white p-4 rounded-md shadow-md">
                    <h2 class="text-xl font-semibold">{{ $libro->nombre }}</h2>
                    <p>Autor: {{ $libro->autor }}</p>
                    <p>Editorial: {{ $libro->editorial }}</p>
                    <p>Año: {{ $libro->anio }}</p>
                    <p>Disponibilidad: {{ $libro->disponible ? 'Disponible' : 'No disponible' }}</p>
                    <a href="{{ route('prestamos.create', ['libro_id' => $libro->id]) }}" class="mt-2 inline-block bg-green-500 text-white rounded-md px-4 py-2 hover:bg-green-600">
                        Realizar Préstamo
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center mt-4">No se encontraron libros.</p>
    @endif
</div>
@endsection

@section('pagination')
@if(isset($libros))
    <div class="mt-4 flex justify-center">
        {{ $libros->appends(request()->query())->links() }} <!-- Esto mantendrá los parámetros de búsqueda al cambiar de página -->
    </div>
@endif
@endsection
