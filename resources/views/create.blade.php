@extends('templates.template')

@section('content')
    <h1>Cadastrar</h1>
    <br>
    <form name="formcad" id="formcad" method="post" action="{{url('vagas ')}}">
        @csrf
        <input type="text" name="Titulo" id="Titulo" placeholder="Titulo">
        <input type="text" name="Cargo" id="Cargo" placeholder="Cargo">
        <input type="text" name="Salario" id="Salario" placeholder="Salario">
        <p>Salario visivel</p>
        <select name="Salario_visivel" id="Salario_visivel">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>
        <input type="text" name="Descricao" id="Descricao" placeholder="Descricao">
        <button><input type="submit" value="Cadastro"></button>
    </form>

    
@endsection