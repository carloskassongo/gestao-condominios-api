<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function index()
    {
        return Periodo::all();
    }

    public function show($id)
    {
        return Periodo::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date'
        ]);

        return Periodo::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $periodo = Periodo::findOrFail($id);

        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date'
        ]);

        $periodo->update($validatedData);

        return $periodo;
    }

    public function destroy($id)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->delete();

        return response()->noContent();
    }
}
