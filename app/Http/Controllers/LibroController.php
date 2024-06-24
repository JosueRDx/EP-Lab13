<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $libros = Libro::query();

        if (!empty($query)) {
            $libros = $libros->where('nombre', 'LIKE', "%$query%")
                             ->orWhere('autor', 'LIKE', "%$query%")
                             ->orWhere('editorial', 'LIKE', "%$query%");
        }

        $libros = $libros->paginate(6);

        return view('welcome', compact('libros', 'query'));
    }
}

