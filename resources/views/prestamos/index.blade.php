@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Préstamos Realizados</h1>
    
    <div class="mb-4 text-center">
        <a href="{{ route('prestamos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Realizar otro préstamo</a>
        <a href="{{ route('libros.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-md ml-2">Ver Libros</a>
    </div>
    
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Libro
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Usuario
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Fecha de Inicio
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Fecha de Devolución
                    </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                        Devuelto
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-gray-800">{{ $prestamo->libro->nombre }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-gray-800">{{ $prestamo->usuario->name ?? 'Usuario no encontrado' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-gray-800">{{ $prestamo->fecha_inicio }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-gray-800">{{ $prestamo->fecha_devolucion ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-gray-800">{{ $prestamo->devuelto ? 'Sí' : 'No' }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('pagination')
    <div class="mt-4 flex justify-center">
        {{ $prestamos->appends(request()->query())->links() }}
    </div>
@endsection
