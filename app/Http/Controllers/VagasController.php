<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelVagas;

class VagasController extends Controller
{
    private $objVagas;

    public function __construct() {
        $this->objVagas = new ModelVagas();
    }

    public function index()
    {
        $vaga=$this->objVagas->all();
        return view('index' ,compact('vaga'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'Titulo' => 'required|string|max:255',
            'Cargo' => 'required|string|max:255',
            'Salario' => 'required|numeric',
            'Salario_visivel' => 'required|boolean',
            'Descricao' => 'required|string',
        ]);

        // Criando a vaga
        $cad = $this->objVagas->create([
            'Titulo' => $request->Titulo,
            'Cargo' => $request->Cargo,
            'Salario' => $request->Salario,
            'Salario_visivel' => $request->Salario_visivel,
            'Descricao' => $request->Descricao,
        ]);

        // Redireciona se o cadastro for bem-sucedido
        if ($cad) {
            return redirect('vagas')->with('success', 'Vaga cadastrada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao cadastrar vaga!');
        }
        
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $vaga=$this->objVagas->find($id);
        return view('create', compact('vaga'));
    }

    public function update(Request $request, string $id)
    {
        $this->objVagas->where(['id' => $id])->update([
            'Titulo' => $request->Titulo,
            'Cargo' => $request->Cargo,
            'Salario' => $request->Salario,
            'Salario_visivel' => $request->Salario_visivel,
            'Descricao' => $request->Descricao,
        ]);
        return redirect('vagas');
    }

    public function destroy(string $id)
    {
        $vaga = ModelVagas::find($id);

        if ($vaga) {
        
            $vaga->delete();

            return redirect('vagas');
        } else {
            // Caso a vaga não seja encontrada
            return redirect('vagas');
        }
    }
}
