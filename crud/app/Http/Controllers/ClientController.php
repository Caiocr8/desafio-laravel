<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'cpf_or_cnpj' => 'required|string',
            'photo' => 'required|image',
            'social_name' => 'required|string',
        ]);
    
        $photo = $request->file('photo');
        $photoPath = $photo->store('images', 'public');
    
        $client = new Client();
        $client->name = $request->input('name');
        $client->birth_date = $request->input('birth_date');
        $client->cpf_or_cnpj = $request->input('cpf_or_cnpj');
        $client->photo = $photoPath;
        $client->social_name = $request->input('social_name');
        $client->created_at = now();
        $client->updated_at = now();
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

        $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'cpf_or_cnpj' => 'required|string',
            'photo' => 'nullable|image',
            'social_name' => 'required|string',
        ]);

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
        $client->updated_at = now();
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
