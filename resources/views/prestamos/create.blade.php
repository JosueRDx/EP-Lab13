@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Nuevo Préstamo</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form method="POST" action="{{ route('prestamos.store') }}">
            @csrf
            <div class="mb-4">
                <label for="libro_id" class="block text-sm font-medium text-gray-700">Libro:</label>
                <select name="libro_id" id="libro_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}" {{ isset($libro_id) && $libro_id == $libro->id ? 'selected' : '' }}>
                            {{ $libro->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="usuario_id" class="block text-sm font-medium text-gray-700">Usuario:</label>
                <select name="usuario_id" id="usuario_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700">Fecha de Devolución:</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar</button>
                <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 ml-2">Retroceder</a>
            </div>
        </form>
    </div>
</div>
@endsection
