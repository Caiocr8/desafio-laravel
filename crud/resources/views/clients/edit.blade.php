@vite('resources/css/app.css')

@section('content')


<form action="{{ route('clients.update', ['id' => $client->id]) }}" method="POST" enctype="multipart/form-data" class="container p-4 bg-white rounded-md shadow-md">
    @csrf
    @method('PUT')

    <h1 class="text-3xl font-bold mb-4 text-[#f37721]">Edit Client</h1>
    <div class="mb-4 ">
        <label class="block text-gray-700 font-bold mb-2" for="name">Name:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="name" value="{{ $client->name }}">
    </div>

    <div class="mb-4 ">
        <label class="block text-gray-700 font-bold mb-2" for="birth_date">Birth Date:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="date" name="birth_date" value="{{ $client->birth_date }}">
    </div>

    <div class="mb-4 ">
        <label class="block text-gray-700 font-bold mb-2" for="cpf_or_cnpj">CPF or CNPJ:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="cpf_or_cnpj" value="{{ $client->cpf_or_cnpj }}">
    </div>

    <div class="mb-4 ">
        <label class="block text-gray-700 font-bold mb-2" for="photo">Photo:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="file" name="photo">
    </div>

    <div class="mb-4 ">
        <label class="block text-gray-700 font-bold mb-2" for="social_name">Social Name:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="social_name" value="{{ $client->social_name }}">
    </div>
    <div class="flex justify-between">
        <a href="{{ route('clients.index') }}" class="bg-[#ffffff] hover:bg-[#f37721] hover:text-[#ffffff] text-[#f37721]  font-bold py-2 px-4 rounded-2xl">
            Voltar
        </a>
        <button class="bg-[#ffffff] hover:bg-[#f37721] hover:text-[#ffffff] text-[#f37721]  font-bold py-2 px-4 rounded-2xl" type="submit">Atualizar</button>
    </div>
    
</form>
