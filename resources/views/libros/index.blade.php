@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a Nuestra Biblioteca</h1>
    <form method="GET" action="{{ route('libros.index') }}" class="mb-4 flex">
        <input type="text" name="query" placeholder="Buscar libros..." value="{{ $query ?? '' }}" class="rounded-md p-2 border border-gray-300 flex-grow">
        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md">Buscar</button>
    </form>

    @if(isset($libros) && $libros->count() > 0)
        <div class="books grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($libros as $libro)
                <div class="book block p-4 bg-white rounded-lg shadow hover:bg-gray-100 cursor-pointer">
                    <h2 class="font-bold text-lg">{{ $libro->nombre }}</h2>
                    <p>Autor: {{ $libro->autor }}</p>
                    <p>Editorial: {{ $libro->editorial }}</p>
                    <p>Año: {{ $libro->anio }}</p>
                    <p>Disponibilidad: {{ $libro->disponibilidad }}</p>
                    <a href="{{ route('prestamos.create', ['libro_id' => $libro->id]) }}" class="mt-4 block text-center px-4 py-2 bg-blue-500 text-white rounded-md">Préstamo</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron libros.</p>
    @endif
</div>
@endsection

@section('pagination')
    <div class="mt-4">
        {{ $libros->appends(request()->query())->links() }} 
    </div>
@endsection
