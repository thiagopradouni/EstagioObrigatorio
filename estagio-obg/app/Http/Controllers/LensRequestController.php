<?php

namespace App\Http\Controllers;

use App\Models\LensRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;

class LensRequestController extends Controller
{
    public function index()
    {
        $requests = LensRequest::paginate(10); // Paginação
        return view('lensrequests.index', compact('requests'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('lensrequests.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'customer_id' => 'required|exists:clientes,id',
            'lens_type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Criar solicitação
        LensRequest::create($request->all());

        return redirect()->route('lensrequests.index')->with('success', 'Solicitação de lente criada com sucesso.');
    }

    public function show($id)
    {
        $request = LensRequest::findOrFail($id);
        return view('lensrequests.show', compact('request'));
    }

    public function edit($id)
    {
        $request = LensRequest::findOrFail($id);
        $clientes = Cliente::all();  // Certifique-se de que este código está correto
        return view('lensrequests.edit', compact('request', 'clientes'));
    }
    

    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'customer_id' => 'required|exists:clientes,id',
            'lens_type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        // Atualizar solicitação
        $lensRequest = LensRequest::findOrFail($id);
        $lensRequest->update($request->all());

        return redirect()->route('lensrequests.index')->with('success', 'Solicitação de lente atualizada com sucesso.');
    }

    // Método destroy para excluir uma solicitação de lentes
    public function destroy($id)
    {
        $lensRequest = LensRequest::findOrFail($id);
        $lensRequest->delete();

        return redirect()->route('lensrequests.index')->with('success', 'Solicitação de lente excluída com sucesso.');
    }
}
