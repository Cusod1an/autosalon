<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Client;
use App\Models\Salon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::has('autos')->get();
        return view('clients.index', compact('clients'));
    }
    public function allIndex()
    {
        $clients = Client::all();
        return view('clients.allIndex', compact('clients'));
    }


    public function show(Client $client)
    {
        $client->load('autos');
        $availableAutos = Auto::where('client_id', null)->get();
        return view('clients.show', compact('client', 'availableAutos'));
    }

    public function create()
    {
        $salons = Salon::all();
        return view('clients.create', compact('salons'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'salon_id' => 'required|integer',
        ]);

        $client = Client::create($validatedData);

        return redirect()->route('clients.show', $client)->with('success', 'Client created successfully');
    }

    public function edit(Client $client)
    {
        $salons = Salon::all();
        return view('clients.edit', compact('client', 'salons'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'salon_id'=> 'required|integer',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.show', $client)->with('success', 'Client updated successfully');
    }

}
