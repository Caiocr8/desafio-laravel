<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <h1>Cadastro de Cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>

        <div>
            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" id="birthdate" required>
        </div>

        <div>
            <label for="cpf_cnpj">CPF/CNPJ:</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
            
        <div>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
        </div>

        <div>
            <label for="nome_social">Nome Social:</label>
            <input type="text" name="nome_social" id="nome_social">
        </div>

        <button type="submit">Cadastrar</button>
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
</body>

</html>
