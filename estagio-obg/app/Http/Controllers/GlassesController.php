<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glasses; // Ajustado para usar o nome singular conforme a convenção

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
        // Validação dos dados
        $request->validate([
            'code' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'fantasy_code' => 'nullable|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'unit_cost' => 'required|numeric',
            'sale_price' => 'required|numeric', // Validação do novo campo
            'brand' => 'nullable|string|max:255',
            'line_material' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ]);

        // Criação do novo óculos
        Glasses::create($request->all());
        return redirect()->route('glasses.index')->with('success', 'Produto adicionado com sucesso');
    }

    public function show(string $id)
    {
        $glass = Glasses::findOrFail($id); // Ajustado para usar o nome singular
        return view('glasses.show', compact('glass'));
    }

    public function edit(string $id)
    {
        $glass = Glasses::findOrFail($id); // Ajustado para usar o nome singular
        return view('glasses.edit', compact('glass'));
    }

    public function update(Request $request, string $id)
    {
        // Validação dos dados
        $request->validate([
            'code' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'fantasy_code' => 'nullable|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'unit_cost' => 'required|numeric',
            'sale_price' => 'required|numeric', // Validação do novo campo
            'brand' => 'nullable|string|max:255',
            'line_material' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ]);

        // Atualização do óculos existente
        $glass = Glasses::findOrFail($id); // Ajustado para usar o nome singular
        $glass->update($request->all());
        return redirect()->route('glasses.index')->with('success', 'Óculos atualizado com sucesso');
    }

    public function destroy(string $id)
    {
        $glass = Glasses::findOrFail($id); // Ajustado para usar o nome singular
        $glass->delete();
        return redirect()->route('glasses.index')->with('success', 'Óculos excluído com sucesso');
    }
}
