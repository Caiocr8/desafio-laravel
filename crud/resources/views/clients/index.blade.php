@vite('resources/css/app.css')
@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold text-center mb-4">Lista de Clientes</h1>
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <a href="{{ route('clients.create') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Adicionar Cliente</a>
    <table class="table-auto w-full mb-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Nome Social</th>
                <th class="px-4 py-2">CPF/CNPJ</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Data de Nascimento</th>
                <th class="px-4 py-2">Foto</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td class="px-4 py-2">{{ $client->nome }}</td>
                    <td class="px-4 py-2">{{ $client->nome_social }}</td>
                    <td class="px-4 py-2">{{ $client->cpf_cnpj }}</td>
                    <td class="px-4 py-2">{{ $client->email }}</td>
                    <td class="px-4 py-2">{{ $client->data_nascimento }}</td>
                    <td class="px-4 py-2"><img src="{{ asset($client->foto) }}" alt="Foto do cliente" width="100" class="rounded"></td>
                    <td class="px-4 py-2">
                        <a href="{{ route('clients.edit', $client) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                        <form action="{{ route('clients.delete', $client) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>
</div>    

    


