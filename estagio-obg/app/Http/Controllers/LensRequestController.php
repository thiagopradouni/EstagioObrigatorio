<?php

namespace App\Http\Controllers;

use App\Models\LensRequest;
use Illuminate\Http\Request;
use App\Models\Cliente;

class LensRequestController extends Controller
{
    public function index()
    {
        $requests = LensRequest::paginate(40); // Paginação
        return view('lensrequests.index', compact('requests'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('lensrequests.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:clientes,id',
            'lens_type' => 'required|string',
            'sphere_od' => 'nullable|numeric',
            'sphere_os' => 'nullable|numeric',
            'cylinder_od' => 'nullable|numeric',
            'cylinder_os' => 'nullable|numeric',
            'axis_od' => 'nullable|integer',
            'axis_os' => 'nullable|integer',
            'add' => 'nullable|numeric',
            'pupil_distance' => 'nullable|numeric',
            'lens_material' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
    
        LensRequest::create($request->all());
    
        return redirect()->route('lensrequests.index')->with('success', 'Solicitação e prescrição de lentes criadas com sucesso.');
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
            'lens_type' => 'required|string',
            'sphere_od' => 'nullable|numeric',
            'sphere_os' => 'nullable|numeric',
            'cylinder_od' => 'nullable|numeric',
            'cylinder_os' => 'nullable|numeric',
            'axis_od' => 'nullable|integer',
            'axis_os' => 'nullable|integer',
            'add' => 'nullable|numeric',
            'pupil_distance' => 'nullable|numeric',
            'lens_material' => 'nullable|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
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
