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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vaga=$this->objVagas->find($id);
        return view('create', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
