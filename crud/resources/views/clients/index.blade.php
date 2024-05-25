<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <h1>Lista de Clientes</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('clients.create') }}" class="btn-add">Adicionar Cliente</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nome Social</th>
                <th>CPF/CNPJ</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->nome }}</td>
                    <td>{{ $client->nome_social }}</td>
                    <td>{{ $client->cpf_cnpj }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->data_nascimento }}</td>
                    <td><img src="{{ asset($client->foto) }}" alt="Foto do cliente" width="100"></td>
                    <td><a href="{{ route('clients.edit', $client) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('clients.destroy', $client) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
