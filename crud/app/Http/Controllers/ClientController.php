<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }

    public function index()
{
    $clients = Client::all();

    return view('clients.index', compact('clients'));
}

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required|email',
        'cpf_cnpj' => 'required',
        'data_nascimento' => 'required',
        'nome_social' => 'required',
        'foto' => 'nullable|file',
    ]);

    $data = [];

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('images/clients'), $filename);
        $data['foto'] = 'images/clients/' . $filename;
    }

    $data['nome'] = $request->input('nome');
    $data['email'] = $request->input('email');
    $data['cpf_cnpj'] = $request->input('cpf_cnpj');
    $data['data_nascimento'] = $request->input('data_nascimento');
    $data['nome_social'] = $request->input('nome_social');

    Client::create($data);

    return redirect()->route('clients.index');
}

public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cpf_cnpj' => 'required',
            'data_nascimento' => 'required',
            'nome_social' => 'required',
            'foto' => 'nullable|file',
        ]);

        $data = [];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images/clients'), $filename);
            $data['foto'] = 'images/clients/' . $filename;
        }

        $data['nome'] = $request->input('nome');
        $data['email'] = $request->input('email');
        $data['cpf_cnpj'] = $request->input('cpf_cnpj');
        $data['data_nascimento'] = $request->input('data_nascimento');
        $data['nome_social'] = $request->input('nome_social');

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
    }
    
};