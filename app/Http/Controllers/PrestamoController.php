<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('libro', 'usuario')->paginate(10); // Agregar paginación con 10 elementos por página
        return view('prestamos.index', compact('prestamos'));
    }

    public function create(Request $request)
    {
        $libro_id = $request->input('libro_id');
        $libros = Libro::all();
        $usuarios = User::all();
        return view('prestamos.create', compact('libros', 'usuarios', 'libro_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_inicio' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamos.index');
    }

    public function edit(Prestamo $prestamo)
    {
        $libros = Libro::all();
        $usuarios = User::all();
        return view('prestamos.edit', compact('prestamo', 'libros', 'usuarios'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'usuario_id' => 'required|exists:users,id',
            'fecha_inicio' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $prestamo->update($request->all());

        return redirect()->route('prestamos.index');
    }
}
