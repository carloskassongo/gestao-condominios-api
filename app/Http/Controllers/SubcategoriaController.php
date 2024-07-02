<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        return Subcategoria::all();
    }

    public function show($id)
    {
        return Subcategoria::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'idCategoria' => 'required|exists:categorias,idCategoria'
        ]);

        return Subcategoria::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);

        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'idCategoria' => 'required|exists:categorias,idCategoria'
        ]);

        $subcategoria->update($validatedData);

        return $subcategoria;
    }

    public function destroy($id)
    {
        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->delete();

        return response()->noContent();
    }
}
