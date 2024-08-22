<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glasses;

class GlassesController extends Controller
{
    public function index()
    {
        $glasses = Glasses::orderBy('created_at', 'DESC')->get();
        return view('glasses.index', compact('glasses'));
    }

    public function create()
    {
        return view('glasses.create');
    }

    public function store(Request $request)
    {
        Glasses::create($request->all());
        return redirect()->route('glasses.index')->with('success', 'Product added successfully');
    }

    public function show(string $id)
    {
        $glasses = Glasses::findOrFail($id);
        return view('glasses.show', compact('glasses'));
    }

    public function edit(string $id)
    {
        $glasses = Glasses::findOrFail($id);
        return view('glasses.edit', compact('glasses'));
    }

    public function update(Request $request, string $id)
    {
        $glasses = Glasses::findOrFail($id);
        $glasses->update($request->all());
        return redirect()->route('glasses.index')->with('success', 'Óculos atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        $glasses = Glasses::findOrFail($id);
        $glasses->delete();
        return redirect()->route('glasses.index')->with('success', 'Óculos adicionado com sucesso');
    }
}
