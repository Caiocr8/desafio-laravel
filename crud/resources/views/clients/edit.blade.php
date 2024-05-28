@vite('resources/css/app.css')

@section('content')
<h1>Edit Client</h1>

<form action="{{ route('clients.update', ['id' => $client->id]) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-md mx-auto">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">Name:</label>
        <input class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="name" value="{{ $client->name }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="birth_date">Birth Date:</label>
        <input class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="date" name="birth_date" value="{{ $client->birth_date }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="cpf_or_cnpj">CPF or CNPJ:</label>
        <input class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="cpf_or_cnpj" value="{{ $client->cpf_or_cnpj }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="photo">Photo:</label>
        <input class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="file" name="photo">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="social_name">Social Name:</label>
        <input class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="social_name" value="{{ $client->social_name }}">
    </div>

    <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600" type="submit">Update</button>
</form>
