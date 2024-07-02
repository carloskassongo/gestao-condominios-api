<?php

namespace App\Http\Controllers;

use App\Models\Moradia;
use Illuminate\Http\Request;

class MoradiaController extends Controller
{
    public function index()
    {
        return Moradia::all();
    }

    public function show($id)
    {
        return Moradia::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'idBloco' => 'required|exists:blocos,idBloco',
            'idCondominio' => 'required|exists:condominios,idCondominio'
        ]);

        return Moradia::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $moradia = Moradia::findOrFail($id);

        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'idBloco' => 'required|exists:blocos,idBloco',
            'idCondominio' => 'required|exists:condominios,idCondominio'
        ]);

        $moradia->update($validatedData);

        return $moradia;
    }

    public function destroy($id)
    {
        $moradia = Moradia::findOrFail($id);
        $moradia->delete();

        return response()->noContent();
    }
}
