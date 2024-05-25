<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $fields = $this->getFields();
        return view('clients.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateClient($request);

        DB::transaction(function () use ($validatedData, $request) {
            if ($request->hasFile('foto')) {
                $validatedData['foto'] = $this->uploadFile($request->file('foto'));
            }

            $validatedData['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

            Client::create($validatedData);
        });

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $client->data_nascimento = Carbon::parse($client->data_nascimento)->format('d/m/Y');
        $fields = $this->getFields();
        return view('clients.edit', compact('client', 'fields'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $this->validateClient($request);

        DB::transaction(function () use ($validatedData, $request, $client) {
            if ($request->hasFile('foto')) {
                $validatedData['foto'] = $this->uploadFile($request->file('foto'), $client->foto);
            }

            $validatedData['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $request->input('data_nascimento'))->format('Y-m-d');

            $client->update($validatedData);
        });

        return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function delete(Client $client)
    {
        if ($client->foto) {
            Storage::delete($client->foto);
        }

        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente deletado com sucesso!');
    }

    private function validateClient(Request $request)
    {
        $rules = [
            'nome' => 'required',
            'email' => 'required|email',
            'cpf_cnpj' => 'required',
            'data_nascimento' => 'required|date_format:d/m/Y',
            'nome_social' => 'required',
            'foto' => 'nullable|file',
        ];

        if ($request->input('document_type') == 'cpf') {
            $rules['cpf_cnpj'] = 'required|cpf';
        } else {
            $rules['cpf_cnpj'] = 'required|cnpj';
        }

        return $request->validate($rules);
    }

    private function uploadFile($file, $oldFile = null)
    {
        if ($oldFile) {
            Storage::delete($oldFile);
        }

        $filename = time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('images/clients', $filename, 'public');
    }

    private function getFields()
    {
        return [
            ['name' => 'nome', 'label' => 'Nome', 'type' => 'text', 'required' => true],
            ['name' => 'data_nascimento', 'label' => 'Data de Nascimento', 'type' => 'date', 'required' => true],
            ['name' => 'cpf_cnpj', 'label' => 'CPF/CNPJ', 'type' => 'text', 'required' => true],
            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
            ['name' => 'foto', 'label' => 'Foto', 'type' => 'file', 'required' => false],
            ['name' => 'nome_social', 'label' => 'Nome Social', 'type' => 'text', 'required' => false],
        ];
    }
}
