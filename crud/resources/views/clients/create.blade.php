@vite('resources/css/app.css')
@vite('resources/js/app/js')

@section('content')


<form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data" class="container max-w-md mx-auto p-4 bg-white rounded-md shadow-md">
    @csrf
    <h1 class="text-3xl font-bold mb-4 text-[#f37721]">Cadastrar cliente</h1>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="name">Nome:</label>
        <input class="w-full text-[#f37721] px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="name">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="email" name="email">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="birth_date">Data de nascimento:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="date" name="birth_date">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="input_type">CPF/CNPJ:</label>
        <select class="w-full px-3 bg-[#FFFFFF] py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" name="input_type" id="input_type">
            <option value="cpf">CPF</option>
            <option value="cnpj">CNPJ</option>
        </select>
    </div>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="cpf_or_cnpj" id="cpf_or_cnpj">
        @error('cpf_or_cnpj')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="photo">Foto:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="file" name="photo">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="social_name">Social Name:</label>
        <input class="w-full px-3 py-2 border text-[#f37721] rounded-md focus:outline-none focus:ring-2 focus:ring-[#f37721]" type="text" name="social_name">
    </div>

    <div class="flex justify-between">
        <a href="{{ route('clients.index') }}" class="bg-[#ffffff] hover:bg-[#f37721] hover:text-[#ffffff] text-[#f37721]  font-bold py-2 px-4 rounded-2xl">
            Voltar
        </a>
        <button class="bg-[#ffffff] hover:bg-[#f37721] hover:text-[#ffffff] text-[#f37721]  font-bold py-2 px-4 rounded-2xl" type="submit">Create</button>   
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</form>