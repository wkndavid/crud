@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">
        <h1>Lista de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary my-4">Criar Clientes</a>

        @if(Session::has('mensaje'))
            <div class="alert alert-success my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Saldo</th>
                <th>Ações</th>
           </thead>
           <tbody>
               @forelse ($clients as $detail)
                <tr>
                    <td>{{ $detail->name }}</td>
                    <td>{{ $detail->due }}</td>
                    <td>
                        <a href="{{ route('client.edit', $detail) }}" class="btn btn-danger">Editar</a>            
                        <form action="{{ route('client.destroy', $detail) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
               @empty
                <div class="text-center">
                    <tr>
                        <td colspan="3">Não há registros!</td>
                    </tr>
                </div>
               @endforelse
           </tbody>
        </table>
            @if($clients->count())
                {{ $clients->links() }}
            @endif
    </div>
@endsection