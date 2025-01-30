@extends('templates.template')

@section('content')
<div class="container">
    <h1>
        @if (isset($vaga))
            Editar
        @else
            Cadastrar
        @endif
    </h1>
    <br>
    @if (isset($vaga))
        <form class="form" name="formEdit" id="formEdit" method="post" action="{{ route('vagas.update', $vaga->id) }}">
            @method('PUT')
    @else
        <form class="form" name="formCad" id="formCad" method="post" action="{{url('vagas')}}">
    @endif
            @csrf
            <input type="text" name="Titulo" id="Titulo" placeholder="Titulo" value="{{$vaga->Titulo ?? ''}}">
            <input type="text" name="Cargo" id="Cargo" placeholder="Cargo" value="{{$vaga->Cargo ?? ''}}">
            <input type="text" name="Salario" id="Salario" placeholder="Salario" value="{{$vaga->Salario ?? ''}}">
            <p>Salario visivel</p>
            <select name="Salario_visivel" id="Salario_visivel">
                <option value="1" @selected(isset($vaga) && $vaga->Salario_visivel == 1)>Sim</option>
                <option value="0" @selected(isset($vaga) && $vaga->Salario_visivel == 0)>Não</option>
            </select>
            <input type="text" name="Descricao" id="Descricao" placeholder="Descricao"
                value="{{$vaga->Descricao ?? ''}}">
            <button class="btninput">
                @if (isset($vaga))
                    <input type="submit" value="Editar">
                @else
                    <input type="submit" value="Cadastro">
                @endif
            </button>
        </form>

</div>
@endsection