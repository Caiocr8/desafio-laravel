@vite('resources/css/app.css')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cadastro de Cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-bold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" class="w-full pl-10 text-sm text-gray-700 @error('nome') border-red-500 @enderror" required>
            @error('nome')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="birthdate" class="block text-gray-700 font-bold mb-2">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="birthdate" class="w-full pl-10 text-sm text-gray-700 @error('data_nascimento') border-red-500 @enderror" required>
            @error('data_nascimento')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cpf_cnpj" class="block text-gray-700 font-bold mb-2">CPF/CNPJ:</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="w-full pl-10 text-sm text-gray-700 @error('cpf_cnpj') border-red-500 @enderror" required>
            @error('cpf_cnpj')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" class="w-full pl-10 text-sm text-gray-700 @error('email') border-red-500 @enderror" required>
            @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-gray-700 font-bold mb-2">Foto:</label>
            <input type="file" name="foto" id="foto" class="w-full pl-10 text-sm text-gray-700 @error('foto') border-red-500 @enderror">
            @error('foto')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nome_social" class="block text-gray-700 font-bold mb-2">Nome Social:</label>
            <input type="text" name="nome_social" id="nome_social" class="w-full pl-10 text-sm text-gray-700 @error('nome_social') border-red-500 @enderror">
            @error('nome_social')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Cadastrar</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
