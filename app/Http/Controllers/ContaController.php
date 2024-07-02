<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        return Conta::all();
    }

    public function show($id)
    {
        return Conta::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'descricao' => 'required|string|max:255'
        ]);

        return Conta::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $conta = Conta::findOrFail($id);

        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'descricao' => 'required|string|max:255'
        ]);

        $conta->update($validatedData);

        return $conta;
    }

    public function destroy($id)
    {
        $conta = Conta::findOrFail($id);
        $conta->delete();

        return response()->noContent();
    }
}
