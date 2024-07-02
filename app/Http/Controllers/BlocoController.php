<?php

namespace App\Http\Controllers;

use App\Models\Bloco;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    public function index()
    {
        return Bloco::all();
    }

    public function show($id)
    {
        return Bloco::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sigla' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'idCondominio' => 'required|exists:condominios,idCondominio'
        ]);

        return Bloco::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $bloco = Bloco::findOrFail($id);

        $validatedData = $request->validate([
            'sigla' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'idCondominio' => 'required|exists:condominios,idCondominio'
        ]);

        $bloco->update($validatedData);

        return $bloco;
    }

    public function destroy($id)
    {
        $bloco = Bloco::findOrFail($id);
        $bloco->delete();

        return response()->noContent();
    }
}
