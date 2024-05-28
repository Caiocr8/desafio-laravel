@vite('resources/css/app.css')
@extends('layouts.master')

@section('content')
<div class="flex flex-col justify-center container p-20">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl text-[#f37721] font-bold">Lista de Clientes</h1>
        <a href="{{ route('clients.create') }}">
            <button class="bg-[#ffffff] hover:bg-[#f37721] shadow-md hover:shadow-[#f37721] hover:text-[#ffffff] text-[#f37721] py-4 px-6 rounded-2xl">
                Adicionar Cliente
            </button>
        </a>
    </div>
    
    <div class="bg-[#FFFFFF] p-4  rounded-lg shadow-md ">
        <ul class="list-none mb-4">
            @foreach($clients as $client)
                <li class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 p-4 bg-[#F37A26] rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $client->photo) }}" class="w-16 h-16 rounded-full mr-4">
                        <span class="text-lg text-white">{{ $client->name }} ({{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/Y') }})</span>
                    </div>
                    <div class="flex  items-start mt-2 gap-5">
                        <a href="{{ route('clients.show', $client->id) }}" class="hover:bg-blue-600 bg-[#ffffff] hover:text-[#ffffff] text-[#f37721] sm:ml-2  font-bold py-2 px-4 rounded">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="hover:bg-yellow-400 bg-[#ffffff] text-[#f37721] hover:text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" class="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:bg-red-600 bg-[#ffffff] text-[#F37A26] hover:text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

