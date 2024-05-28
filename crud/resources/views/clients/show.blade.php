@vite('resources/css/app.css')

@section('content')
<div class="max-w-md mx-auto pt-6 md:p-6 lg:p-12">
    <h1 class="text-3xl font-bold mb-4">{{ $client->name }}</h1>

    <div class="flex flex-wrap mb-4">
        <p class="w-full md:w-1/2 xl:w-1/3 mb-2 md:mb-0">
            <span class="font-bold">Birth Date:</span> {{ $client->birth_date }}
        </p>
        <p class="w-full md:w-1/2 xl:w-1/3 mb-2 md:mb-0">
            <span class="font-bold">CPF or CNPJ:</span> {{ $client->cpf_or_cnpj }}
        </p>
        <p class="w-full md:w-1/2 xl:w-1/3 mb-2 md:mb-0">
            <span class="font-bold">Social Name:</span> {{ $client->social_name }}
        </p>
    </div>
</div>