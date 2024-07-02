<?php

namespace App\Http\Controllers;

use App\Models\ContaBancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
    public function index()
    {
        return ContaBancaria::all();
    }

    public function show($id)
    {
        return ContaBancaria::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'descricao' => 'required|string|max:255',
            'banco' => 'required|string|max:100',
            'agencia' => 'required|string|max:20',
            'conta' => 'required|string|max:20'
        ]);

        return ContaBancaria::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $contaBancaria = ContaBancaria::findOrFail($id);

        $validatedData = $request->validate([
            'idCondominio' => 'required|exists:condominios,idCondominio',
            'descricao' => 'required|string|max:255',
            'banco' => 'required|string|max:100',
            'agencia' => 'required|string|max:20',
            'conta' => 'required|string|max:20'
        ]);

        $contaBancaria->update($validatedData);

        return $contaBancaria;
    }

    public function destroy($id)
    {
        $contaBancaria = ContaBancaria::findOrFail($id);
        $contaBancaria->delete();

        return response()->noContent();
    }
}
