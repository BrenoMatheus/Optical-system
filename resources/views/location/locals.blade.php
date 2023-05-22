@extends('layouts.main')
@section('title', 'Local')
@section('content')
<div class="container text-center">
    <h1 class="p-2">Locals</h1>
    <div class="row p-3 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon" ></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
    <div class="col-auto p-2 pt-4">
        <a class="btn btn-success" href="/local/create-local">Cadastrar Local</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">Local</th>
              <th scope="col">Contato</th>
              <th scope="col">Telefone</th>
              <th scope="col">Açoes</th>
            </tr>
          </thead>
          <tbody id ='display'> </tbody>
          <tbody id ='all'>
          @foreach($locals as $local)
          <tr>
          <td>{{$local->local}}</td>
          <td>{{$local->contato}}</td>
          <td>{{$local->telefone}}</td>
          <td class='row'>
            <a href="/local/{{ $local->id }}" class="btn col-auto  btn-info"><img src="/img/icons/eye-outline.svg" class="icon"></a>
            <a href="/local/edit/{{ $local->id }}" class="btn col-auto btn-warning"><img src="/img/icons/create-outline.svg" class="icon"></a>
            <form action="/local/{{ $local->id }}" class='col-auto' method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><img src="/img/icons/trash-outline.svg" class="icon"></button>
            </form>
          </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        </div>
    <div class="row justify-content-center" id="all">
        <div class="col-auto">
        {{ $locals->links() }}
        </div> 
    </div>
</div>

@endsection