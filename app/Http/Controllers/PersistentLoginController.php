<?php

namespace App\Http\Controllers;

use App\Models\PersistentLogin;
use Illuminate\Http\Request;

class PersistentLoginController extends Controller
{
    public function index()
    {
        return PersistentLogin::all();
    }

    public function show($series)
    {
        return PersistentLogin::findOrFail($series);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'series' => 'required|string|max:64|unique:persistent_logins',
            'username' => 'required|string|max:255',
            'token' => 'required|string|max:64',
            'last_used' => 'required|date'
        ]);

        return PersistentLogin::create($validatedData);
    }

    public function update(Request $request, $series)
    {
        $persistentLogin = PersistentLogin::findOrFail($series);

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'token' => 'required|string|max:64',
            'last_used' => 'required|date'
        ]);

        $persistentLogin->update($validatedData);

        return $persistentLogin;
    }

    public function destroy($series)
    {
        $persistentLogin = PersistentLogin::findOrFail($series);
        $persistentLogin->delete();

        return response()->noContent();
    }
}
