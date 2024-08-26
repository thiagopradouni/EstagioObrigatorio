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
            'glasses_id' => 'required|exists:glasses,id',
            'cliente_id' => 'required|exists:clientes,id',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric',
            'payment_method' => 'required|in:Cash,Credit Card,Debit Card,Bank Transfer',
        ]);

        // Verifica se há estoque suficiente
        $glass = Glasses::findOrFail($request->glasses_id);
        if ($glass->quantity < $request->quantity) {
            return redirect()->back()->withErrors('Estoque insuficiente para realizar a venda.');
        }

        // Calcula o valor bruto com base na quantidade e no valor de venda
        $gross_value = $request->quantity * $glass->sale_price;

        // Cria a venda com o valor bruto calculado
        $sale = Sale::create([
            'glasses_id' => $request->glasses_id,
            'cliente_id' => $request->cliente_id,
            'quantity' => $request->quantity,
            'gross_value' => $gross_value,
            'net_value' => $gross_value - ($request->discount ?? 0), // Calcula o valor líquido após o desconto
            'discount' => $request->discount,
            'payment_method' => $request->payment_method,
        ]);

        // Atualiza o estoque
        $glass->quantity -= $request->quantity;
        $glass->save();

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
            'glasses_id' => 'required|exists:glasses,id',
            'cliente_id' => 'required|exists:clientes,id',
            'quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric',
            'payment_method' => 'required|in:Cash,Credit Card,Debit Card,Bank Transfer',
        ]);

        $sale = Sale::findOrFail($id);

        // Reverte o estoque antigo
        $old_glass = Glasses::findOrFail($sale->glasses_id);
        $old_glass->quantity += $sale->quantity;
        $old_glass->save();

        // Verifica se há estoque suficiente para a nova quantidade
        $new_glass = Glasses::findOrFail($request->glasses_id);
        if ($new_glass->quantity < $request->quantity) {
            return redirect()->back()->withErrors('Estoque insuficiente para realizar a venda.');
        }

        // Calcula o novo valor bruto
        $gross_value = $request->quantity * $new_glass->sale_price;

        // Atualiza a venda com o novo valor bruto
        $sale->update([
            'glasses_id' => $request->glasses_id,
            'cliente_id' => $request->cliente_id,
            'quantity' => $request->quantity,
            'gross_value' => $gross_value,
            'net_value' => $gross_value - ($request->discount ?? 0), // Calcula o valor líquido após o desconto
            'discount' => $request->discount,
            'payment_method' => $request->payment_method,
        ]);

        // Atualiza o estoque com a nova quantidade vendida
        $new_glass->quantity -= $request->quantity;
        $new_glass->save();

        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso e estoque ajustado.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        // Reverte o estoque ao deletar a venda
        $glass = Glasses::findOrFail($sale->glasses_id);
        $glass->quantity += $sale->quantity;
        $glass->save();

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso e estoque revertido.');
    }
}
