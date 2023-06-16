<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Country;
use App\Models\Salon;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index()
    {   $salon = Salon::find(1);
        $autos = Auto::all();
        $auto = Auto::first();
        return view('autos.index', compact('autos', 'auto', 'salon'));
    }

    public function show(Auto $auto)
    {
        return view('autos.show', compact('auto'));
    }

    public function edit(Auto $auto)
    {
        $brands = Brand::all();
        $countries = Country::all();
        $clients= Client::all();
        $salons = Salon::all();
        $bodyTypes = ['Sedan', 'SUV', 'Hatchback'];
        return view('autos.edit', compact('auto', 'brands', 'countries', 'clients', 'salons', 'bodyTypes'));
    }

    public function update(Request $request, Auto $auto)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required|exists:brands,id',
            'country' => 'required|exists:countries,id',
            'price' => 'required|numeric',
        ]);

        $auto->update($request->all());

        return redirect()->route('autos.index')->with('success', 'Автомобиль успешно обновлен');
    }

    public function create()
    {
        $brands = Brand::all();
        $countries = Country::all();
        $salons = Salon::all();
        $clients = Client::all();
        $bodyTypes = ['Sedan', 'SUV', 'Hatchback'];
        return view('autos.create', compact('salons', 'brands', 'countries', 'bodyTypes', 'clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'salon_id' => 'required|integer',
            'country_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'client_id' => 'nullable|exists:clients,id',
            'series' => 'required',
            'guaranty' => 'required',
            'price' => 'required|numeric',
            'body_type' => 'required',
        ]);
        Auto::create($validatedData);

        return redirect()->route('autos.index')->with('success');
    }
    public function deleteWithClient(Request $request, Auto $auto)
    {
        $client = $auto->client;
        $auto->delete();

        if ($client) {
            $client->delete();
        }

        return redirect()->route('autos.index')->with('success');
    }

}
