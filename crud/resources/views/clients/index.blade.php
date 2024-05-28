@vite('resources/css/app.css')
@extends('layouts.master')

@section('content')
<div class="flex flex-col justify-center p-20">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Lista de Clientes</h1>
        <a href="{{ route('clients.create') }}">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Adicionar Cliente
            </button>
        </a>
    </div>
    
    <div class="bg-gray-800 p-4 rounded-lg shadow-md">
        <ul class="list-none mb-4">
            @foreach($clients as $client)
                <li class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-2 p-4 bg-gray-700 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $client->photo) }}" class="w-16 h-16 rounded-full mr-4">
                        <span class="text-lg text-white">{{ $client->name }} ({{ $client->birth_date }})</span>
                    </div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center mt-2 sm:mt-0">
                        <a href="{{ route('clients.show', $client->id) }}" class="text-blue-400 hover:text-blue-600 sm:ml-2">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="text-yellow-400 hover:text-yellow-600 sm:ml-4 mt-2 sm:mt-0">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="sm:ml-4 mt-2 sm:mt-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

