<?php

namespace App\Http\Controllers;

use App\Models\Cobranca;
use Illuminate\Http\Request;

class CobrancaController extends Controller
{
    public function index()
    {
        return Cobranca::all();
    }

    public function show($id)
    {
        return Cobranca::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idMoradia' => 'required|exists:moradias,idMoradia',
            'idPeriodo' => 'required|exists:periodos,idPeriodo',
            'valor' => 'required|numeric',
            'paga' => 'required|boolean'
        ]);

        return Cobranca::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $cobranca = Cobranca::findOrFail($id);

        $validatedData = $request->validate([
            'idMoradia' => 'required|exists:moradias,idMoradia',
            'idPeriodo' => 'required|exists:periodos,idPeriodo',
            'valor' => 'required|numeric',
            'paga' => 'required|boolean'
        ]);

        $cobranca->update($validatedData);

        return $cobranca;
    }

    public function destroy($id)
    {
        $cobranca = Cobranca::findOrFail($id);
        $cobranca->delete();

        return response()->noContent();
    }
}
