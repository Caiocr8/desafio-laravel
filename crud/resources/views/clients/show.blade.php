@vite('resources/css/app.css')

@section('content')
<div class="flex justify-center bg-[#f37721] container">
    <div class="p-6">
        <h1 class="text-5xl font-bold mb-4 text-center">{{ $client->name }}</h1>

        <div class="flex flex-col gap-6  items-center">
            <div class="flex flex-col mb-4 w-full gap-3">
                <p class="mb-2 font-bold text-4xl">
                    Data de nascimento:
                    {{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/Y') }}
                </p>
                <p class="mb-2 font-bold text-4xl">
                    CPF ou CNPJ:
                    {{ $client->cpf_or_cnpj }}
                </p>
                <p class="mb-2 font-bold text-4xl">
                    Nome Social:
                    {{ $client->social_name }}
                </p>
            </div>
            <div class="md:w-1/3">
                <img src="{{ asset('storage/' . $client->photo) }}" class="w-full  object-cover rounded-lg">
            </div>
        </div>

        <!-- Adicionando o botão de voltar -->
        <a href="{{ route('clients.index') }}" class="bg-[#ffffff] mt-2 hover:bg-[#f37721] hover:text-[#ffffff] text-[#f37721]  font-bold py-2 px-4 rounded-2xl block w-full text-center">
            Voltar
        </a>
    </div>
</div>
