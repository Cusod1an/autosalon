<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Client;
use Illuminate\Http\Request;

class BuyCarController extends Controller
{
    public function destroy(Client $client, Auto $auto)
    {
        $client->delete();
        $auto->delete();
        return redirect()->route('clients.index');
    }

}
