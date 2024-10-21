<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        // Adicionando busca se necessário
        $search = $request->input('search');

        // Definindo a query
        $clientes = Cliente::query();

        // Condição de busca
        if ($search) {
            $clientes->where('nome', 'like', "%{$search}%")
                     ->orWhere('cpf', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
        }

        // Paginação
        $clientes = $clientes->paginate(40);

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $this->validateCliente($request);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $this->validateCliente($request, $cliente->id);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso.');
    }

    protected function validateCliente(Request $request, $ignoreId = null)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'max:255', 'unique:clientes,cpf,' . $ignoreId, function ($attribute, $value, $fail) {
                if (!$this->validaCPF($value)) {
                    $fail('O CPF é inválido.');
                }
            }],
            'email' => 'required|string|email|max:255|unique:clientes,email,' . $ignoreId,
            'data_nascimento' => ['required', 'date', function ($attribute, $value, $fail) {
                if (Carbon::parse($value)->age < 13) {
                    $fail('O cliente deve ter pelo menos 13 anos.');
                }
            }],
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    protected function validaCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
