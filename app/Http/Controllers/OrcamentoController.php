<?php

namespace App\Http\Controllers;

use App\Models\Orcamento;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    public function index()
    {
        return Orcamento::all();
    }

    public function show($id)
    {
        return Orcamento::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'idSubcategoria' => 'required|exists:subcategorias,idSubcategoria',
            'idPeriodo' => 'required|exists:periodos,idPeriodo',
            'valor' => 'required|numeric'
        ]);

        return Orcamento::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $orcamento = Orcamento::findOrFail($id);

        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'idSubcategoria' => 'required|exists:subcategorias,idSubcategoria',
            'idPeriodo' => 'required|exists:periodos,idPeriodo',
            'valor' => 'required|numeric'
        ]);

        $orcamento->update($validatedData);

        return $orcamento;
    }

    public function destroy($id)
    {
        $orcamento = Orcamento::findOrFail($id);
        $orcamento->delete();

        return response()->noContent();
    }
}
