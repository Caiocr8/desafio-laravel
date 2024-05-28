<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Rules\CPFRule;
use App\Rules\CNPJRule;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $inputType = $request->input('input_type');

        $rules = [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
        ];

        if ($inputType === 'cpf') {
            $rules['cpf_or_cnpj'] = ['required', 'string', 'max:14', new CPFRule];
        } elseif ($inputType === 'cnpj') {
            $rules['cpf_or_cnpj'] = ['required', 'string', 'max:18', new CNPJRule];
        }

        $request->validate($rules);

        $photoPath = $request->file('photo')->store('images', 'public');

        $client = new Client();
        $client->name = $request->input('name');
        $client->birth_date = $request->input('birth_date');
        $client->cpf_or_cnpj = $request->input('cpf_or_cnpj');
        $client->photo = $photoPath;
        $client->social_name = $request->input('social_name');
        $client->email = $request->input('email');
        $client->save();

        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $inputType = $request->input('input_type');

        $rules = [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
        ];

        if ($inputType === 'cpf') {
            $rules['cpf_or_cnpj'] = ['required', 'string', 'max:14', new CPFRule];
        } elseif ($inputType === 'cnpj') {
            $rules['cpf_or_cnpj'] = ['required', 'string', 'max:18', new CNPJRule];
        }

        $request->validate($rules);

        if ($request->hasFile('photo')) {
            if ($client->photo) {
                Storage::disk('public')->delete($client->photo);
            }
            $photoPath = $request->file('photo')->store('images', 'public');
            $client->photo = $photoPath;
        }

        $client->name = $request->input('name');
        $client->birth_date = $request->input('birth_date');
        $client->cpf_or_cnpj = $request->input('cpf_or_cnpj');
        $client->social_name = $request->input('social_name');
        $client->email = $request->input('email');
        $client->save();

        return redirect()->route('clients.index');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->photo) {
            Storage::disk('public')->delete($client->photo);
        }

        $client->delete();
        return redirect()->route('clients.index');
    }
}
