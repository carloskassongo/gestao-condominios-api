<?php

namespace App\Http\Controllers;

use App\Models\Autorizacao;
use Illuminate\Http\Request;

class AutorizacaoController extends Controller
{
    public function index()
    {
        return Autorizacao::all();
    }

    public function show($id)
    {
        return Autorizacao::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'autorizacao' => 'required|string|max:255'
        ]);

        return Autorizacao::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $autorizacao = Autorizacao::findOrFail($id);

        $validatedData = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'autorizacao' => 'required|string|max:255'
        ]);

        $autorizacao->update($validatedData);

        return $autorizacao;
    }

    public function destroy($id)
    {
        $autorizacao = Autorizacao::findOrFail($id);
        $autorizacao->delete();

        return response()->noContent();
    }
}
