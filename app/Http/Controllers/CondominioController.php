<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;

class CondominioController extends Controller
{
    public function index()
    {
        return Condominio::all();
    }

    public function show($id)
    {
        return Condominio::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'razaoSocial' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14',
            'ie' => 'nullable|string|max:20',
            'im' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255',
            'telefone' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'endereco' => 'required|string|max:255',
            'numeroEnd' => 'required|string|max:10',
            'complementoEnd' => 'nullable|string|max:50',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:8'
        ]);

        return Condominio::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $condominio = Condominio::findOrFail($id);

        $validatedData = $request->validate([
            'razaoSocial' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14',
            'ie' => 'nullable|string|max:20',
            'im' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255',
            'telefone' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'endereco' => 'required|string|max:255',
            'numeroEnd' => 'required|string|max:10',
            'complementoEnd' => 'nullable|string|max:50',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:8'
        ]);

        $condominio->update($validatedData);

        return $condominio;
    }

    public function destroy($id)
    {
        $condominio = Condominio::findOrFail($id);
        $condominio->delete();

        return response()->noContent();
    }
}

