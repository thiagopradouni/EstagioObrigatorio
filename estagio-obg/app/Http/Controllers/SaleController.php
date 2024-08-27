<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Glasses;
use App\Models\Cliente;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('created_at', 'DESC')->paginate(10); 
        return view('sales.index', compact('sales'));
    }
    
    public function create()
    {
        $clientes = Cliente::all();
        $glasses = Glasses::all();
        return view('sales.create', compact('clientes', 'glasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'glasses_id' => 'required|array',
            'glasses_id.*' => 'required|exists:glasses,id',
            'cliente_id' => 'required|exists:clientes,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'discount' => 'nullable|numeric',
            'payment_method' => 'required|in:Dinheiro,Cartão de Crédito,Cartão de Débito,Pix',
        ]);
    
        $totalGrossValue = 0;
    
        // Verifica estoque e calcula o valor total bruto
        foreach ($request->glasses_id as $index => $glassId) {
            $glass = Glasses::findOrFail($glassId);
            $quantity = $request->quantity[$index];
    
            if ($glass->quantity < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Estoque insuficiente para realizar a venda do produto: ' . $glass->fantasy_code]);
            }
    
            $totalGrossValue += $quantity * $glass->sale_price;
        }
    
        // Verifica se o desconto não é maior que o valor bruto total
        if ($request->discount > $totalGrossValue) {
            return redirect()->back()->withErrors(['error' => 'O valor do desconto não pode ser maior que o valor total da venda.']);
        }
    
        // Cria a venda
        $sale = Sale::create([
            'cliente_id' => $request->cliente_id,
            'gross_value' => $totalGrossValue,
            'net_value' => $totalGrossValue - ($request->discount ?? 0), 
            'discount' => $request->discount ?? 0.00,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
        ]);
    
        // Atualiza o estoque e cria o relacionamento com os óculos vendidos
        foreach ($request->glasses_id as $index => $glassId) {
            $glass = Glasses::findOrFail($glassId);
            $quantity = $request->quantity[$index];
            
            $sale->glasses()->attach($glassId, ['quantity' => $quantity]);
            
            $glass->quantity -= $quantity;
            $glass->save();
        }
    
        return redirect()->route('sales.index')->with('success', 'Venda criada com sucesso e estoque atualizado.');
    }
    
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $clientes = Cliente::all();
        $glasses = Glasses::all();
        return view('sales.edit', compact('sale', 'clientes', 'glasses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'glasses_id' => 'required|array',
            'glasses_id.*' => 'required|exists:glasses,id',
            'cliente_id' => 'required|exists:clientes,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'discount' => 'nullable|numeric',
            'payment_method' => 'required|in:Dinheiro,Cartão de Crédito,Cartão de Débito,Pix',
        ]);

        $sale = Sale::findOrFail($id);

        // Reverter o estoque antigo
        foreach ($sale->glasses as $glass) {
            $glass->quantity += $glass->pivot->quantity;
            $glass->save();
        }

        // Limpar relacionamentos antigos
        $sale->glasses()->detach();

        $totalGrossValue = 0;

        // Verificar estoque e calcular o novo valor bruto
        foreach ($request->glasses_id as $index => $glassId) {
            $glass = Glasses::findOrFail($glassId);
            $quantity = $request->quantity[$index];

            if ($glass->quantity < $quantity) {
                return redirect()->back()->withErrors(['error' => 'Estoque insuficiente para realizar a venda do produto: ' . $glass->fantasy_code]);
            }

            $totalGrossValue += $quantity * $glass->sale_price;
        }

        // Verificar se o desconto não é maior que o valor bruto total
        if ($request->discount > $totalGrossValue) {
            return redirect()->back()->withErrors(['error' => 'O valor do desconto não pode ser maior que o valor total da venda.']);
        }

        // Atualizar a venda com o novo valor bruto
        $sale->update([
            'cliente_id' => $request->cliente_id,
            'gross_value' => $totalGrossValue,
            'net_value' => $totalGrossValue - ($request->discount ?? 0), 
            'discount' => $request->discount ?? 0.00,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
        ]);

        // Atualiza o estoque com a nova quantidade vendida
        foreach ($request->glasses_id as $index => $glassId) {
            $glass = Glasses::findOrFail($glassId);
            $quantity = $request->quantity[$index];

            $sale->glasses()->attach($glassId, ['quantity' => $quantity]);

            $glass->quantity -= $quantity;
            $glass->save();
        }

        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso e estoque ajustado.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        // Reverter o estoque ao deletar a venda
        foreach ($sale->glasses as $glass) {
            $glass->quantity += $glass->pivot->quantity;
            $glass->save();
        }

        // Deletar a venda
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso e estoque revertido.');
    }
}
