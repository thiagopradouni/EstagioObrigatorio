<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostSale;
use App\Models\Sale;

class PostSaleController extends Controller
{
    public function index()
    {
        $postSales = PostSale::with('sale.cliente')->orderBy('scheduled_date', 'ASC')->paginate(10);
        return view('post_sales.index', compact('postSales'));
    }

    public function create()
    {
        $sales = Sale::all();
        return view('post_sales.create', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'scheduled_date' => 'required|date',
        ]);

        PostSale::create([
            'sale_id' => $request->sale_id,
            'scheduled_date' => $request->scheduled_date,
            'comments' => $request->comments,
        ]);

        return redirect()->route('post_sales.index')->with('success', 'Pós-venda criada com sucesso.');
    }

    public function edit($id)
    {
        $postSale = PostSale::findOrFail($id);
        return view('post_sales.edit', compact('postSale'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'actual_date' => 'nullable|date',
            'completed' => 'required|boolean',
            'comments' => 'nullable|string',
        ]);

        $postSale = PostSale::findOrFail($id);
        $postSale->update([
            'actual_date' => $request->actual_date,
            'completed' => $request->completed,
            'comments' => $request->comments,
        ]);

        return redirect()->route('post_sales.index')->with('success', 'Pós-venda atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $postSale = PostSale::findOrFail($id);
        $postSale->delete();

        return redirect()->route('post_sales.index')->with('success', 'Pós-venda excluída com sucesso.');
    }
}
