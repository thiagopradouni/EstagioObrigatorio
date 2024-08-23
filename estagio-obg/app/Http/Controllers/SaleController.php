<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Glasses;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('created_at', 'DESC')->paginate(10); 
        return view('sales.index', compact('sales'));
    }
    
    public function create()
    {
        $glasses = Glasses::all();
        return view('sales.create', compact('glasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'glasses_id' => 'required|exists:glasses,id',
            'quantity' => 'required|integer',
            'customer_name' => 'required|string',
            'gross_value' => 'required|numeric',
            'net_value' => 'required|numeric',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $glasses = Glasses::all();
        return view('sales.edit', compact('sale', 'glasses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'glasses_id' => 'required|exists:glasses,id',
            'quantity' => 'required|integer',
            'customer_name' => 'required|string',
            'gross_value' => 'required|numeric',
            'net_value' => 'required|numeric',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
