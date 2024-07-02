<?php

namespace App\Http\Controllers;

use App\Models\Lancamento;
use Illuminate\Http\Request;

class LancamentoController extends Controller
{
    public function index()
    {
        return Lancamento::all();
    }

    public function show($id)
    {
        return Lancamento::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'valor' => 'required|numeric',
            'idContaBancaria' => 'required|exists:conta_bancarias,idContaBancaria',
            'idConta' => 'required|exists:contas,idConta'
        ]);

        return Lancamento::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $lancamento = Lancamento::findOrFail($id);

        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'data_lancamento' => 'required|date',
            'valor' => 'required|numeric',
            'idContaBancaria' => 'required|exists:conta_bancarias,idContaBancaria',
            'idConta' => 'required|exists:contas,idConta'
        ]);

        $lancamento->update($validatedData);

        return $lancamento;
    }

    public function destroy($id)
    {
        $lancamento = Lancamento::findOrFail($id);
        $lancamento->delete();

        return response()->noContent();
    }
}
