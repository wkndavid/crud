@extends('theme.base')

@section('content')

    <div class="container py-5 text-center">

    @if(isset($client))
        <h1>Editar Cliente</h1>
    @else
        <h1>Criar Cliente</h1>
    @endif


    @if(isset($client))
        <form action="{{ route('client.update', $client) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('client.store') }}" method="POST">
    @endif


            @csrf
            
            <div class="mb-3">
                <!-- Nome -->
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Nome do Cliente" value="{{ old('name') ?? @$client->name }}">
                <p class="form-text">Escreva o nome do Cliente</p>
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <!-- Saldo -->
                <label for="due" class="form-label">Saldo</label>
                <input type="number" name="due" class="form-control" placeholder="Saldo do Cliente" step="0.001" value="{{ old('due') ?? @$client->due }}">
                <p class="form-text">Escreva o Saldo do Cliente</p>
                @error('due')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <!-- Comentários -->
                <label for="comments" class="form-label">Comentários</label>
                <textarea name="comments" class="form-control" cols="30" rows="4">{{ old('comments') ?? @$client->comments }}</textarea>
                <p class="form-text">Escreva alguns comentários</p>
                @error('comments')
                <p class="form-text">{{ $message }}</p>
                @enderror
            </div>
                
                @if(isset($client))
                <button type="submit" class="btn btn-success">Editar Cliente</button>
                @else
                <button type="submit" class="btn btn-success">Registrar Cliente</button>
                @endif

        </form>
    </div>

@endsection