@vite('resources/css/app.css')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full max-w-xl">
            <div class="bg-white shadow-md rounded-md p-8">
                <div class="text-2xl font-bold mb-4">Editar Cliente</div>
                <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex gap-3 mb-4">
                        <label for="nome" class="block text-gray-700 font-bold mb-2">Nome:</label>

                        <div class="w-full">
                            <input id="nome" type="text"
                                class="form-control @error('nome') border-red-500 @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="nome"
                                value="{{ $client->nome }}" required autocomplete="nome" autofocus>

                            @error('nome')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">E-mail</label>

                        <div class="w-full">
                            <input id="email" type="email"
                                class="form-control @error('email') border-red-500 @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="email"
                                value="{{ $client->email }}" required autocomplete="email">

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 mb-4">
                        <label for="cpf_cnpj" class="block text-gray-700 font-bold mb-2">CPF/CNPJ</label>

                        <div class="w-full">
                            <input id="cpf_cnpj" type="text"
                                class="form-control @error('cpf_cnpj') border-red-500 @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="cpf_cnpj"
                                value="{{ $client->cpf_cnpj }}" required autocomplete="cpf_cnpj">

                            @error('cpf_cnpj')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 mb-4">
                        <label for="data_nascimento" class="block text-gray-700 font-bold mb-2">Data de
                            Nascimento</label>

                        <div class="w-full">
                            <input id="data_nascimento" type="date"
                                class="form-control @error('data_nascimento') border-red-500 @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="data_nascimento"
                                value="{{ $client->data_nascimento }}" required autocomplete="data_nascimento">

                            @error('data_nascimento')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-3 mb-4">
                        <label for="foto" class="block text-gray-700 font-bold mb-2">Foto</label>

                        <div class="w-full">
                            <input id="foto" type="file"
                                class="form-control @error('foto') border-red-500 @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="foto"
                                value="{{ old('foto') }}" autocomplete="foto">

                            @error('foto')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Atualizar
                        </button>
                        <a href="{{ route('clients.index') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
