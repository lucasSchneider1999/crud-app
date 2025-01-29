@extends('templates.template')

@section('content')
    <h1>Vagas</h1>
    <a href="{{url('vagas/create')}}">
        <button>Cadastrar</button>
    </a>
    <table>
  <thead>
    <tr>
      <th>id</th>
      <th>Titulo</th>
      <th>Cargo</th>
      <th>Salario</th>
      <th>Descricao</th>
      <th>Acao</th>
    </tr>
  </thead>
  <tbody>
  @foreach($vaga as $vagas)
    <tr>
      <td>{{$vagas->id}}</td>
      <td>{{$vagas->Titulo}}</td>
      <td>{{$vagas->Cargo}}</td>
      @if($vagas->Salario_visivel)
        <td>{{ $vagas->Salario }}</td>
      @else
        <td>-</td>
      @endif
      <td>{{$vagas->Descricao}}</td>
      <td>
        <a href="{{url("vagas/$vagas->id/edit")}}">
          <button>Editar</button>
        </a>
        <!-- Formulário de Exclusão -->
        <form action="{{ route('vagas.destroy', $vagas->id) }}" method="POST" onsubmit="return confirm('Deseja realmente deletar esta vaga?')">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar</button>
        </form> 
      </td>
    </tr>
    @endforeach()
  </tbody>
</table>
@endsection